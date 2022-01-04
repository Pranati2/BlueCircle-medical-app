<?php

declare(strict_types=1);

namespace App\Modules\Raw\Enrollments;

class EnrollmentsMapper
{
    public static function mapFrom(array $data): Enrollments
    {
        return new Enrollments(
            self::nullStringToInt($data["id"] ?? null),
            $data["students_id"],
            $data["courses_id"],
            $data["enrolled_by_users_id"],
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