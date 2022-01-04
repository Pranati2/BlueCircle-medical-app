<?php
// phpcs:ignoreFile
declare(strict_types=1);

namespace App\Modules\Core;

abstract class MyHelpers
{
    public static function cleanRawData(array $data): array
    {
        foreach ($data as $key => $value) {
            if (gettype($data[$key]) === 'string') {
                $data[$key] = html_entity_decode(strip_tags(trim($data[$key])));
                if ($data[$key] === "true" || $data[$key] === "false") {
                    $data[$key] = $data[$key] === "true";
                }
            } else if (gettype($data[$key]) === 'array') {
                $data[$key] = self::cleanRawData($data[$key]);
            }
        }
        return $data;
    }
}
