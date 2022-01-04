<?php

declare(strict_types=1);

namespace App\Modules\Raw\Courses;

class CoursesMapper
{
    public static function mapFrom(array $data): Courses
    {
        return new Courses(
            self::nullStringToInt($data["id"] ?? null),
            $data["name"],
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