<?php
/**
 * Created by PhpStorm.
 * User: SHAHIN
 * Date: 4/19/2020
 * Time: 12:12 AM
 */

namespace App\Http\Controllers\Api\v1\Monitoring;


use App\Core\General\AppResponse;
use App\Core\OS\GetListFromOS;
use App\Http\Controllers\Controller;

class ServerStatusController extends Controller
{

    use GetListFromOS;

    public function runProcess()
    {
        $processList = $this->getRunningProcess();
        if ($processList) {
            $response = new \stdClass();
            $response->list = $processList;
            return new AppResponse(200, $response);
        }

        return new AppResponse(204);
    }
}