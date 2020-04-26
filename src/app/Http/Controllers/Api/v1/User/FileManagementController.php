<?php
/**
 * Created by PhpStorm.
 * User: SHAHIN
 * Date: 4/19/2020
 * Time: 12:12 AM
 */

namespace App\Http\Controllers\Api\v1\User;


use App\Core\File\CreateUserDirectoryHandler;
use App\Core\File\CreateUserDirectoryRequest;
use App\Core\File\CreateUserFileHandler;
use App\Core\File\CreateUserFileRequest;
use App\Core\File\getUserDirectoriesHandler;
use App\Core\File\getUserFilesHandler;
use App\Core\General\AppResponse;
use App\Http\Controllers\General\AppBaseController;
use Illuminate\Http\Request;

class FileManagementController extends AppBaseController
{
    /**
     * @param CreateUserFileRequest $request
     * @return AppResponse
     */
    public function createUserFile(CreateUserFileRequest $request)
    {
        $fileCreate = (resolve(CreateUserFileHandler::class))->Handle($request);
        if ($fileCreate) {
            $response = new \stdClass();
            $response->file_create = true;
            return new AppResponse(200, $response);
        }

        return new AppResponse(500);
    }

    /**
     * @param CreateUserDirectoryRequest $request
     * @return AppResponse
     */
    public function createUserDirectory(CreateUserDirectoryRequest $request)
    {
        $directoryCreate = (resolve(CreateUserDirectoryHandler::class))->Handle($request);
        if ($directoryCreate) {
            $response = new \stdClass();
            $response->file_create = true;
            return new AppResponse(200, $response);
        }

        return new AppResponse(500);
    }

    /**
     * @param Request $request
     * @return AppResponse
     */
    public function listFiles(Request $request)
    {
        $filesList = (resolve(getUserFilesHandler::class))->Handle($request);
        if ($filesList) {
            $response = new \stdClass();
            $response->list = $filesList;
            return new AppResponse(200, $response);
        }

        return new AppResponse(204);
    }

    /**
     * @param Request $request
     * @return AppResponse
     */
    public function listDirectories(Request $request)
    {
        $directoriesList = (resolve(getUserDirectoriesHandler::class))->Handle($request);
        if ($directoriesList) {
            $response = new \stdClass();
            $response->list = $directoriesList;
            return new AppResponse(200, $response);
        }

        return new AppResponse(204);
    }
}