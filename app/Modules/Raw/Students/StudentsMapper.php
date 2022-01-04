<?php

declare(strict_types=1);

namespace App\Modules\Raw\Students;

use App\Modules\Raw\Courses\CoursesMapper;

class StudentsMapper
{
    public static function mapFrom(array $data): Students
    {
        return new Students(
            self::nullStringToInt($data["id"] ?? null),
            $data["name"],
            array_key_exists("courses", $data)
                ? array_map(function ($row) {
                    return CoursesMapper::mapFrom($row);
                }, $data["courses"]) : [],
            $data["created_at"] ?? date('Y-m-d H:i:s'),
            $data["updated_at"] ?? null,
        );
    }

    private static function nullStringToInt($str): ?int
    {
        if ($str !== null) {
            return (int)$str;
        }
        return null;
    }
}