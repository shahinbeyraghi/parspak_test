<?php
/**
 * Created by PhpStorm.
 * User: SHAHIN
 * Date: 4/20/2020
 * Time: 9:48 PM
 */

namespace App\Core\OS;


use App\Core\General\OSTrait;
use App\Core\General\Statics;
use Illuminate\Support\Facades\Auth;

trait GetListFromOS
{
    use OSTrait;

    public function getUsersFile()
    {
        $baseAddress = Statics::BASE_ADDRESS . Auth::user()->id;
        $command = str_replace('{baseAddress}', $baseAddress, Statics::GET_USERS_FILE);
        $filesList = $this->runCommand($command)[0] ?? '';
        $filesList = explode(',', $filesList);
        $list = [];
        foreach ($filesList as $file) {
            if ($file) {
                $list[] = str_replace('file_', '', $file);
            }
        }
        return $list;
    }

    public function getUsersDirectory()
    {
        $list = [];
        $baseAddress = Statics::BASE_ADDRESS . Auth::user()->id;
        $command = str_replace('{baseAddress}', $baseAddress, Statics::GET_USERS_DIRECTORY);
        $filesList = $this->runCommand($command) ?? [];
        foreach ($filesList as $file) {
            $list[] = str_replace([$baseAddress . '/directory_', '/'], '', $file);
        }
        return $list;
    }

    public function getRunningProcess()
    {
        $filesList = $this->runCommand(Statics::GET_RUNNING_PROCESS) ?? [];
        $list = [];
        foreach ($filesList as $key => $file) {
            if ($key == 0)
                continue;

            $row = explode(' ', $file);
            $counter = 0;
            $field = [];
            foreach ($row as $index => $item) {
                if ($item) {
                    $fieldKey = $this->getRunningProcessKey($counter);
                    if ($counter < 3) {
                        $field[$fieldKey] = $item;
                        $counter++;
                    }
                    else
                        $field[$fieldKey] = ($field[$fieldKey] ?? '') . $item;
                }
            }
            $list[] = $field;
        }
        return $list;
    }

    private function getRunningProcessKey($key)
    {
        switch ($key) {
            case 0:
                return 'pId';
                break;
            case 1:
                return 'User';
                break;
            case 2:
                return 'Time';
                break;
            case 3:
                return 'Command';
                break;
        }
    }
}