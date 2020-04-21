<?php
/**
 * Created by PhpStorm.
 * User: SHAHIN
 * Date: 4/19/2020
 * Time: 12:12 AM
 */

namespace App\Http\Controllers\Monitoring;


use App\Core\General\AppResponse;
use App\Core\OS\GetListFromOS;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ServerStatusController extends Controller
{

    use GetListFromOS;

    public function runProcess()
    {
        $processList = $this->getRunningProcess();
        return view('monitoring/run_process', compact('processList'));
    }
}