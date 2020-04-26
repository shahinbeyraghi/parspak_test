<?php
/**
 * Created by PhpStorm.
 * User: SHAHIN
 * Date: 4/19/2020
 * Time: 12:12 AM
 */

namespace App\Http\Controllers\User;


use App\Core\File\CreateUserDirectoryHandler;
use App\Core\File\CreateUserDirectoryRequest;
use App\Core\File\CreateUserFileHandler;
use App\Core\File\CreateUserFileRequest;
use App\Core\File\getUserDirectoriesHandler;
use App\Core\File\getUserFilesHandler;
use App\Core\OS\GetListFromOS;
use App\Http\Controllers\General\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FileManagementController extends AppBaseController
{

    use GetListFromOS;

    /**
     * @param CreateUserFileRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createUserFile(CreateUserFileRequest $request)
    {
        $fileCreate = (resolve(CreateUserFileHandler::class))->Handle($request);
        if ($fileCreate) {
            Session::flash('message', 'File Created');
            Session::flash('alert-class', 'alert-success');
        } else {
            Session::flash('message', 'Create File Failed!');
            Session::flash('alert-class', 'alert-danger');
        }
        return redirect('users/files-name');
    }

    /**
     * @param CreateUserDirectoryRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createUserDirectory(CreateUserDirectoryRequest $request)
    {
        $fileCreate = (resolve(CreateUserDirectoryHandler::class))->Handle($request);
        if ($fileCreate) {
            Session::flash('message', 'Directory Created');
            Session::flash('alert-class', 'alert-success');
        } else {
            Session::flash('message', 'Create Directory Failed!');
            Session::flash('alert-class', 'alert-danger');
        }
        return redirect('users/directories-name');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listFiles(Request $request)
    {
        $filesList = (resolve(getUserFilesHandler::class))->Handle($request);
        return view('user/users_file', compact('filesList'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listDirectories(Request $request)
    {
        $directoriesList = (resolve(getUserDirectoriesHandler::class))->Handle($request);
        return view('user/users_directory', compact('directoriesList'));
    }
}