<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Modules\Core\HTTPResponseCodes;
use App\Modules\Eloquent\Enrollment\EnrollmentService;
use Illuminate\Http\Request;
use Exception;

class EloquentEnrollmentController
{
    /** @param EnrollmentService */
    private $service;

    public function __construct(
        EnrollmentService $service,
    ) {
        $this->service = $service;
    }



    public function getAll()
    {
        try {
            return $this->service->getAll();
        } catch (Exception $error) {
            return response()->json(
                [
                    'exception' => get_class($error),
                    'errors'    => $error->getMessage(),
                ],
                HTTPResponseCodes::BadRequest['code']
            );
        }
    }

    public function get(int $id)
    {
        try {
            return $this->service->get((int)$id)->toArray();
        } catch (Exception $error) {
            return response()->json(
                [
                    'exception' => get_class($error),
                    'errors'    => $error->getMessage(),
                ],
                HTTPResponseCodes::BadRequest['code']
            );
        }
    }

    public function update()
    {
        try {
            return response($this->service->update([
                "students_id" =>  rand(1, 10000),
                "courses_id" => rand(1, 10000),
                "enrolled_by_users_id" => 1,
            ])->toArray());
        } catch (Exception $error) {
            return response()->json(
                [
                    'exception' => get_class($error),
                    'errors'    => $error->getMessage(),
                ],
                HTTPResponseCodes::BadRequest['code']
            );
        }
    }
}