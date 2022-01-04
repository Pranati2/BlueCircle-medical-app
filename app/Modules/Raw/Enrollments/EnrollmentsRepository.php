<?php

declare(strict_types=1);

namespace App\Modules\Raw\Enrollments;

use Illuminate\Support\Facades\DB;
use Exception;

class EnrollmentsRepository
{

    protected $tableName = "students_courses_enrollment";
    protected $selectableColumns = [
        "students_courses_enrollment.id",
        "students_courses_enrollment.students_id",
        "students_courses_enrollment.courses_id",
        "students_courses_enrollment.enrolled_by_users_id",
        "students_courses_enrollment.created_at",
        "students_courses_enrollment.updated_at"
    ];

    public function __construct()
    {
    }

    public function getAll(): array
    {
        $selectColumns = implode(", ", $this->selectableColumns);
        $result = json_decode(json_encode(DB::select("SELECT $selectColumns FROM {$this->tableName} LIMIT 0,100")), true);
        return $result;
    }
    public function get(int $id): Enrollments
    {
        $selectColumns = implode(", ", $this->selectableColumns);
        $result = json_decode(json_encode(DB::selectOne("SELECT $selectColumns
            FROM {$this->tableName}
            WHERE {$this->tableName}.id = :id", [
            "id" => $id
        ])), true);
        if ($result === null) {
            throw new Exception("Invalid Student Id");
        }
        return EnrollmentsMapper::mapFrom($result);
    }

    public function update(Enrollments $object): Enrollments
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