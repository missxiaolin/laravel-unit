<?php

namespace Tests\Unit;

use App\Support\Encrypt\Clients\Encryption;
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
}
