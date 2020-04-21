<?php
/**
 * Created by PhpStorm.
 * User: SHAHIN
 * Date: 4/20/2020
 * Time: 9:51 PM
 */

namespace App\Core\General;


trait OSTrait
{
    public function runCommand($command)
    {
        exec($command, $response, $a );
        return $response;
    }
}