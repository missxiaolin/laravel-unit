<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Support\Utility\JwtAuth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TokenTest extends TestCase
{
    public function testToken()
    {
        $token = JwtAuth::getToken(['userId' => 1024]);
        $verify = JwtAuth::verifyToken($token);
        $this->assertEquals(array_get($verify, 'userId'), 1024);
    }
}
