<?php
/**
 * Created by PhpStorm.
 * User: gb
 * Date: 2019-04-25
 * Time: 15:19
 */

namespace App\Support\Encrypt;


interface ClientInterface
{
    /**
     * @desc   加密算法
     * @param $input
     * @return string
     */
    public function encrypt($input): string;

    /**
     * @desc   解密算法
     * @param $input
     * @return string
     */
    public function decrypt($input): string;

}