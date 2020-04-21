<?php
/**
 * Created by PhpStorm.
 * User: SHAHIN
 * Date: 4/20/2020
 * Time: 8:39 PM
 */

namespace App\Core\File;


use App\Core\General\Statics;
use Illuminate\Support\Facades\Auth;

trait FileManagement
{

    public function createFile()
    {
        $address = Statics::FILE_ADDRESS . escapeshellcmd(Auth::user()->name);
        if (is_file($address)) {
            return true;
        } elseif (!is_file($address)) {
            return file_put_contents("$address", ' ');
        }
        return false;
    }


    public function createDirectory()
    {
        $address = Statics::DIRECTORY_ADDRESS . escapeshellcmd(Auth::user()->name);
        if (is_dir($address)) {
            return true;
        }
        if (!is_dir($address)) {
            return mkdir("$address", 777, true);
        }
        return false;
    }

}
