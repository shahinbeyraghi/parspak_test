<?php
/**
 * Created by PhpStorm.
 * User: SHAHIN
 * Date: 4/20/2020
 * Time: 9:19 PM
 */

namespace App\Core\General;


class Statics
{
    const FILE_ADDRESS = '/opt/myprogram/file_';
    const DIRECTORY_ADDRESS = '/opt/myprogram/directory_';
    const GET_USERS_FILE = "ls -p /opt/myprogram | grep -v / | tr '\n' ','";
    const GET_USERS_DIRECTORY = "ls -d /opt/myprogram/*/";
    const GET_RUNNING_PROCESS = "ps aux";
}