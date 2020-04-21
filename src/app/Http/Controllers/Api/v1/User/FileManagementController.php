<?php
/**
 * Created by PhpStorm.
 * User: SHAHIN
 * Date: 4/19/2020
 * Time: 12:12 AM
 */

namespace App\Http\Controllers\Api\v1\User;


use App\Core\File\FileManagement;
use App\Core\General\AppResponse;
use App\Core\OS\GetListFromOS;
use App\Http\Controllers\General\AppBaseController;

class FileManagementController extends AppBaseController
{
    use FileManagement;
    use GetListFromOS;

    public function createUserFile()
    {
        $fileCreate = $this->createFile();
        if ($fileCreate) {
            $response = new \stdClass();
            $response->file_create = true;
            return new AppResponse(200, $response);
        }

        return new AppResponse(500);
    }

    public function createUserDirectory()
    {
        $fileCreate = $this->createDirectory();
        if ($fileCreate) {
            $response = new \stdClass();
            $response->file_create = true;
            return new AppResponse(200, $response);
        }

        return new AppResponse(500);
    }

    public function listFiles()
    {
        $filesList = $this->getUsersFile();
        if ($filesList) {
            $response = new \stdClass();
            $response->list = $filesList;
            return new AppResponse(200, $response);
        }

        return new AppResponse(204);
    }

    public function listDirectories()
    {
        $filesList = $this->getUsersDirectory();
        if ($filesList) {
            $response = new \stdClass();
            $response->list = $filesList;
            return new AppResponse(200, $response);
        }

        return new AppResponse(204);
    }
}