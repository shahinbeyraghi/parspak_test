<?php
/**
 * Created by PhpStorm.
 * User: SHAHIN
 * Date: 4/20/2020
 * Time: 8:39 PM
 */

namespace App\Core\File;


use App\Core\General\Statics;

trait FileManagement
{

    public function createFile($fileName)
    {
        $address = Statics::FILE_ADDRESS . $fileName;
        if (is_file($address)) {
            return true;
        } elseif (!is_file($address)) {
            return file_put_contents("$address", ' ');
        }
        return false;
    }


    public function createDirectory($directoryName)
    {
        $address = Statics::DIRECTORY_ADDRESS . $directoryName;
        if (is_dir($address)) {
            return true;
        }
        if (!is_dir($address)) {
            return mkdir("$address", 777, true);
        }
        return false;
    }

}
