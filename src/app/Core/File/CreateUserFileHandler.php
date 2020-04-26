<?php
/**
 * Created by PhpStorm.
 * User: SHAHIN
 * Date: 4/26/2020
 * Time: 8:45 PM
 */

namespace App\Core\File;


use App\Core\General\BasicHandler;

class CreateUserFileHandler implements BasicHandler
{
    use FileManagement;

    /**
     * @param CreateUserFileRequest $request
     * @return boolean
     */
    public function Handle($request)
    {
        $request->validated();
        return $this->createFile($request->file_name);
    }

}