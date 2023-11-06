<?php
declare (strict_types = 1);

namespace app\index\controller;
use app\index\middleware\Check;

class Index extends BaseController
{
    protected $middleware = [
//        'auth' 	=> ['except' 	=> ['hello'] ],
//        'Check' => ['only' 		=> ['hello'] ],
    ];
    public function index()
    {
        return '您好！这是一个[index]示例应用';
    }

    public function hello($name = 'ThinkPHP6')
    {
        echo $name;
    }

}
