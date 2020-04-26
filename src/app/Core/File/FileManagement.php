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

    /**
     * @param $fileName
     * @return bool|int
     */
    public function createFile($fileName)
    {
        $address = $this->generateFileAddress($fileName);
        if (is_file($address)) {
            return true;
        } elseif (!is_file($address)) {
            return file_put_contents("$address", ' ');
        }
        return false;
    }


    /**
     * @param $directoryName
     * @return bool
     */
    public function createDirectory($directoryName)
    {
        $address = $this->generateDirectoryAddress($directoryName);
        if (is_dir($address)) {
            return true;
        }
        return $this->returnOrCreateDir($address);
    }

    /**
     * @param $fileName
     * @return string
     */
    private function generateFileAddress($fileName)
    {
        $address = Statics::BASE_ADDRESS  . Auth::user()->id;
        $this->returnOrCreateDir($address);
        return $address . '/file_' . escapeshellcmd($fileName);
    }

    /**
     * @param $directory
     * @return string
     */
    private function generateDirectoryAddress($directory)
    {
        $address = Statics::BASE_ADDRESS  . Auth::user()->id;
        $this->returnOrCreateDir($address);
        return $address . '/directory_' . escapeshellcmd($directory);
    }

    /**
     * @param $address
     * @return boolean
     */
    private function returnOrCreateDir($address)
    {
        if (!is_dir($address)) {
            return mkdir("$address", 0777, true);
        }
    }

}
