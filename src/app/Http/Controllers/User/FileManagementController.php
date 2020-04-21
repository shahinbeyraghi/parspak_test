<?php
/**
 * Created by PhpStorm.
 * User: SHAHIN
 * Date: 4/19/2020
 * Time: 12:12 AM
 */

namespace App\Http\Controllers\User;


use App\Core\File\FileManagement;
use App\Core\General\AppResponse;
use App\Core\OS\GetListFromOS;
use App\Http\Controllers\General\AppBaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FileManagementController extends AppBaseController
{
    use FileManagement;
    use GetListFromOS;

    public function createUserFile()
    {
        $fileCreate = $this->createFile();
        if ($fileCreate) {
            Session::flash('message', 'File Created');
            Session::flash('alert-class', 'alert-success');
        } else {
            Session::flash('message', 'Create File Failed!');
            Session::flash('alert-class', 'alert-danger');
        }
        return redirect('users/files-name');
    }

    public function createUserDirectory()
    {
        $fileCreate = $this->createDirectory();
        if ($fileCreate) {
            Session::flash('message', 'Directory Created');
            Session::flash('alert-class', 'alert-success');
        } else {
            Session::flash('message', 'Create Directory Failed!');
            Session::flash('alert-class', 'alert-danger');
        }
        return redirect('users/directories-name');
    }

    public function listFiles()
    {
        $filesList = $this->getUsersFile();
        return view('user/users_file', compact('filesList'));
    }

    public function listDirectories()
    {
        $directoriesList = $this->getUsersDirectory();
        return view('user/users_directory', compact('directoriesList'));
    }
}