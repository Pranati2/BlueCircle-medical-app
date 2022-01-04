<?php
declare(strict_types = 1);

namespace App\Modules\Core;

abstract class HTTPResponseCodes
{
    const Success = [
        "title" => "success",
        "code" => 200,
        "message" => 'Request has been successfully processed.'
    ];

    const NotFound = [
        'title' => "not_found_error",
        "code" => 404,
        "message" => 'Could not locate resource.'
    ];

    const PermissionDenied = [
        'title' => "permission_denied",
        "code" => 401,
        "message" => 'Permission Denied.'
    ];

    const InvalidArguments = [
        "title" => "InvalidArgumentsError",
        "code" => 404,
        "message" => "Invalid arguments. Server failed to process your request."
    ];

    const BadRequest = [
        "title" => "bad_request",
        "code" => 400,
        "message" => "Server failed to process your request."
    ];
}
