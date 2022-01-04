<?php

declare(strict_types=1);

namespace App\Modules\Raw\Students;

use Illuminate\Support\Facades\DB;
use Exception;

class StudentsRepository
{

    protected $tableName = "students";
    protected $selectableColumns = [
        "students.id",
        "students.name",
        "students.created_at",
        "students.updated_at",
        "GROUP_CONCAT(JSON_OBJECT(
            'id', courses.id,
            'name', courses.name,
            'created_at', courses.created_at,
            'updated_at', courses.updated_at
        ) SEPARATOR '|+|') AS 'courses'"
    ];
    protected $joins = [
        "LEFT JOIN students_courses_enrollment ON students_courses_enrollment.students_id = students.id",
        "LEFT JOIN courses ON courses.id = students_courses_enrollment.courses_id"
    ];

    public function getAll(): array
    {
        $selectColumns = implode(", ", $this->selectableColumns);
        $joins = implode(" ", $this->joins);
        $result = json_decode(json_encode(DB::select("SELECT $selectColumns FROM {$this->tableName} $joins GROUP BY students.id LIMIT 0,100")), true);
        return array_map(function ($students) {
            if ($students["courses"] !== '{"id": null, "name": null, "created_at": null, "updated_at": null}') {
                $students["courses"] = array_map(function ($row) {
                    return json_decode($row, true);
                }, explode("|+|", $students["courses"]));
            } else {
                $students["courses"] = [];
            }
            return $students;
        }, $result);
    }
    public function get(int $id): Students
    {
        $selectColumns = implode(", ", $this->selectableColumns);
        $joins = implode(" ", $this->joins);
        $result = json_decode(json_encode(DB::selectOne("SELECT $selectColumns
            FROM {$this->tableName}
            $joins
            WHERE {$this->tableName}.id = :id
            GROUP BY students.id", [
            "id" => $id
        ])), true);
        if ($result === null) {
            throw new Exception("Invalid Student Id");
        }

        if ($result["courses"] !== '{"id": null, "name": null, "created_at": null, "updated_at": null}') {
            $result["courses"] = array_map(function ($row) {
                return json_decode($row, true);
            }, explode("|+|", $result["courses"]));
        } else {
            $result["courses"] = [];
        }

        return StudentsMapper::mapFrom($result);
    }

    public function update(Students $object): Students
    {
        return DB::transaction(function () use ($object) {
            // Step 1. Create/Update audience_segments
            DB::table($this->tableName)->updateOrInsert([
                "id" => $object->getId()
            ], $object->toSQL());

            $id = ($object->getId() === null || $object->getId() === 0)
                ? (int)DB::getPdo()->lastInsertId() : $object->getId();

            return $this->get($id);
        });
    }
}