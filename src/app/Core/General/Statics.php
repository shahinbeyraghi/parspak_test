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
    const BASE_ADDRESS = '/opt/myprogram/';
    const FILE_ADDRESS = Statics::BASE_ADDRESS;
    const DIRECTORY_ADDRESS = Statics::BASE_ADDRESS;
    const GET_USERS_FILE = "ls -p {baseAddress} | grep -v / | tr '\n' ','";
    const GET_USERS_DIRECTORY = "ls -d {baseAddress}/*/";
    const GET_RUNNING_PROCESS = "ps aux";
}