<?php
/**
 * Created by PhpStorm.
 * User: SHAHIN
 * Date: 4/26/2020
 * Time: 10:34 PM
 */

namespace App\Core\File;


use App\Core\General\BasicHandler;
use App\Core\OS\GetListFromOS;

class getUserDirectoriesHandler implements BasicHandler
{
    use GetListFromOS;

    public function Handle($request)
    {
        return $this->getUsersDirectory();
    }
}