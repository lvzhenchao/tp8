<?php
declare (strict_types = 1);
namespace app\service\controller;

class RedisService
{

    public $client = '';

    /**
     * RedisService constructor.
     * @param int $db
     * @throws Exception
     */
    public function __construct($db = 0)
    {
        try {

            $this->client = Yii::$app->redis;
            $this->client->select($db);//选择数据库
        } catch (\Exception $e) {
            halt("redis服务连接异常");
        }
    }

    public function __call($name, $arguments)
    {
        return $this->client->$name(...$arguments);
    }
}