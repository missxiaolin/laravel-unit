<?php

namespace Tests\Unit;

use App\Support\Encrypt\Clients\Encryption;
use App\Support\Utility\JwtAuth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testEncryption()
    {
        $str = Encryption::getInstance()->encrypt("ceshi");
        $pwd = Encryption::getInstance()->decrypt($str);
        $this->assertStringEndsWith($pwd, "ceshi");
    }

    public function testToken()
    {
        $token = JwtAuth::getToken(['userId' => 1024]);
        $verify = JwtAuth::verifyToken($token);
        $this->assertEquals(array_get($verify, 'userId'), 1024);
    }
}
