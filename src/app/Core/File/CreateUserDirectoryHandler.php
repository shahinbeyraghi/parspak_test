<?php
/**
 * Created by PhpStorm.
 * User: SHAHIN
 * Date: 4/26/2020
 * Time: 8:45 PM
 */

namespace App\Core\File;


use App\Core\General\BasicHandler;

class CreateUserDirectoryHandler implements BasicHandler
{
    use FileManagement;

    /**
     * @param CreateUserDirectoryRequest $request
     * @return boolean
     */
    public function Handle($request)
    {
        $request->validated();
        return $this->createDirectory($request->directory_name);
    }

}