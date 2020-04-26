<?php
/**
 * Created by PhpStorm.
 * User: SHAHIN
 * Date: 4/26/2020
 * Time: 10:22 PM
 */

namespace App\Core\File;


use App\Core\General\BasicHandler;
use App\Core\OS\GetListFromOS;

class getUserFilesHandler implements BasicHandler
{
    use GetListFromOS;

    public function Handle($request)
    {
        return $this->getUsersFile();
    }
}