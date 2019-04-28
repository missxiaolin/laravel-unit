<?php
/**
 * Created by PhpStorm.
 * User: gb
 * Date: 2019-04-25
 * Time: 15:22
 */

namespace App\Support\Encrypt\Clients;


use App\Support\Encrypt\ClientInterface;

class Encryption implements ClientInterface
{

    public $str = "111021";
    public $key = 'APPYJJ-PHONE-LAZY';

    /**
     * @param $input
     * @return string
     */
    public function encrypt($input): string
    {
        $res = base64_encode($input);
        $code = $res ^ $this->key;
        return $code;
    }

    /**
     * @param $input
     * @return string
     */
    public function decrypt($input): string
    {
        return base64_decode($input ^ $this->key);
    }
}