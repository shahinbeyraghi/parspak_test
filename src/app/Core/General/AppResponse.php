<?php

namespace App\Core\General;


use JsonSerializable;
use stdClass;

class AppResponse implements JsonSerializable
{
    const META_STATUS_MAP = [
        '204' => 'Content Not Found',
        '200' => 'OK',
        '400' => 'Bad Request',
        '401' => 'Unauthorized',
        '403' => 'Forbidden',
        '404' => 'Not Found',
        '405' => 'Method Not Allowed',
        '419' => 'Unknown Status',
        '422' => 'Unprocessable Entity',
        '500' => 'Internal Server Error',
        '501' => 'Not Implemented',
        '502' => 'Bad Gateway',
        '503' => 'Service Unavailable',
        '504' => 'Gateway Timeout',
    ];
    /**
     * @var stdClass
     */
    protected $response;

    /**
     * Response constructor.
     * @param int $status
     * @param stdClass|null $data
     * @param stdClass|null $meta
     * @param array $errors
     */
    public function __construct(int $status = 200, ?stdClass $data = null, ?stdClass $meta = null, array $errors = [])
    {
        $this->response = new stdClass();
        $this->response->code = $status;
        $this->response->meta = $meta ?? $this->createMeta((string) $status);
        $this->response->data = $data ?? new stdClass();
        $this->response->errors = $errors;
    }

    /**
     * @param string $status
     * @param string|null $description
     * @return stdClass
     */
    private function createMeta(string $status = '200', ?string $description = null): stdClass
    {
        return self::generateMeta($status, $description);
    }

    public function jsonSerialize()
    {
        return $this->response;
    }

    /**
     * @param string $status
     * @param string|null $description
     * @return stdClass
     */
    public static function generateMeta(string $status = '200', ?string $description = null): stdClass
    {
        $meta = new stdClass();
        $meta->code = (string)$status;
        $meta->description = $description ?? self::metaDescription($status);
        return $meta;
    }

    /**
     * @param string $status
     * @return string
     */
    public static function metaDescription(string $status): string
    {
        if(isset(self::META_STATUS_MAP[$status])){
            return self::META_STATUS_MAP[$status];
        }

        if(is_numeric($status)){
            $s = (int) $status;
            if($s >=200 && $s<=299){
                return self::META_STATUS_MAP['200'];
            }
            return self::META_STATUS_MAP['500'];
        }

        return $status;
    }
}