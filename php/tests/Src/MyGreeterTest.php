<?php

use PHPUnit\Framework\TestCase;
use Src\MyGreeter;


/**
 * Class MyGreeterTest
 * 测试MyGreeter类
 * 
 * 基于原始MyGreaterTest类调整了测试用例，test_greeting方法中增加了对返回的问候语是否在规则中的判断
 */
class MyGreeterTest extends TestCase
{
    private MyGreeter $greeter;

    /**
     * @var array
     * 问候语数组
     */
    private $msgArr = [
        "Good morning",
        "Good afternoon",
        "Good evening"
    ];

    /**
     * 初始化方法
     */
    public function setUp(): void
    {
        
        /**
         * 原始的初始化方法未调用父类的初始化方法
         */
        parent::setUp();
        $this->greeter = new MyGreeter();
    }

    /**
     * 测试初始化方法
     */
    public function test_init()
    {
        $this->assertInstanceOf(
            MyGreeter::class,
            $this->greeter
        );
    }

    /**
     * 测试问候语
     */
    public function test_greeting()
    {
        // echo $this->greeter->greeting();
        /** 
         * 判断返回的问候语是否在规则中
         */
        $this->assertTrue(
            in_array($this->greeter->greeting(), $this->msgArr)
        );
    }
}
