<?php


namespace Src;


class MyGreeter
{

    /**
     * @var array
     * 用于存储时间段和对应的问候语
     */
    public $rules = [
        ["time" => ["00:00:00", "06:00:00"], "msg" => "Good evening"],
        ["time" => ["06:00:00", "12:00:00"], "msg" => "Good morning"],
        ["time" => ["12:00:00", "18:00:00"], "msg" => "Good afternoon"],
        ["time" => ["18:00:00", "24:00:00"], "msg" => "Good evening"]
    ];


    /**
     * @return string
     * 根据当前时间返回对应的问候语
     */
    public function greeting($now = ''){
        // 如果没有传入时间，使用当前时间
        $now === '' && $now = strtotime(date("H:i:s"));
        foreach ($this->rules as $rule) {
            if (!isset($rule["time"]) || !is_array($rule["time"]) || count($rule["time"]) !== 2) {
                continue; // 跳过格式不正确的规则
            }

            $firstTimeStamp = strtotime($rule["time"][0]);
            $lastTimeStamp = strtotime($rule["time"][1]);

            if ($firstTimeStamp <= $now && $now < $lastTimeStamp) {
                return $rule["msg"];
            }
        }

        // 如果没有匹配的规则，返回默认消息或抛出异常
        return "No matching greeting rule found";

    }
}