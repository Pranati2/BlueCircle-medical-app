<?php

declare(strict_types=1);

namespace App\Modules\Eloquent\Students;

use App\Models\Students;

class StudentsService
{

    public function getAll(): array
    {
        return json_decode(json_encode(Students::get()->take(100)), true);
    }

    public function get(int $id): Students
    {
        return Students::find($id);
    }

    /**
     * @param array $unvalidatedData
     * @return Students
     */
    public function update(array $unvalidatedData): Students
    {
        return Students::create($unvalidatedData);
    }
}