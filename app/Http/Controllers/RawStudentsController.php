<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Modules\Core\HTTPResponseCodes;
use App\Modules\Raw\Students\StudentsService;
use Illuminate\Http\Request;
use Exception;

class RawStudentsController
{
    /** @param StudentsService */
    private $service;

    public function __construct(
        StudentsService $service,
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
                "name" => "Test Student",
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