<?php

declare(strict_types=1);

namespace App\Modules\Eloquent\Enrollment;

use App\Models\Enrollment;

class EnrollmentService
{

    public function getAll(): array
    {
        return json_decode(json_encode(Enrollment::all()->take(100)), true);
    }

    public function get(int $id): Enrollment
    {
        $result = Enrollment::find($id);
        return $result;
    }

    /**
     * @param array $unvalidatedData
     * @return Enrollment
     */
    public function update(array $unvalidatedData): Enrollment
    {
        return Enrollment::create($unvalidatedData);
    }
}