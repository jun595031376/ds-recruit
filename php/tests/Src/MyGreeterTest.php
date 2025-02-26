<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Src\MyGreeter;

/**
 * Class MyGreeterTest
 * @package Tests
 */
class MyGreeterTest extends TestCase
{
    private $greeter;

    /** 
     * 初始化测试环境
     */
    protected function setUp(): void
    {
        $this->greeter = new MyGreeter();
    }

    /**
     * 测试 setUp 方法是否正确初始化了 $this->greeter 属性
     */

    public function test_init()
    {
        // 调用 setUp 方法
        $this->setUp();
        // 断言 $this->greeter 是 MyGreeter 类的一个实例
        $this->assertInstanceOf(
            MyGreeter::class,
            $this->greeter
        );
    }


    public function test_greeting_morning()
    {
        // 测试早晨时间段，验证在 06:00:00 和 11:59:59 时返回 "Good morning"
        $this->assertEquals("Good morning", $this->greeter->greeting(strtotime("06:00:00")));
        $this->assertEquals("Good morning", $this->greeter->greeting(strtotime("11:59:59")));
    }

    public function test_greeting_afternoon()
    {
        // 测试下午时间段，验证在 12:00:00 和 17:59:59 时返回 "Good afternoon"
        $this->assertEquals("Good afternoon", $this->greeter->greeting(strtotime("12:00:00")));
        $this->assertEquals("Good afternoon", $this->greeter->greeting(strtotime("17:59:59")));
    }

    public function test_greeting_evening()
    {
        // 测试晚上时间段，验证在 05:59:59、18:00:00 和 23:59:59 时返回 "Good evening"
        $this->assertEquals("Good evening", $this->greeter->greeting(strtotime("05:59:59")));
        $this->assertEquals("Good evening", $this->greeter->greeting(strtotime("18:00:00")));
        $this->assertEquals("Good evening", $this->greeter->greeting(strtotime("23:59:59")));
    }

    public function test_greeting_invalid_rule()
    {
        $this->assertEquals("No matching greeting rule found", $this->greeter->greeting(strtotime("25:00:00")));
    }

    public function test_greeting()
    {
        $this->assertNotEmpty($this->greeter->greeting());
    }
}