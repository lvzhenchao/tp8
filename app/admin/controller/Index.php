<?php
declare (strict_types = 1);

namespace app\admin\controller;

use app\common\controller\Common;
use app\service\controller\AliOSS;
use app\service\controller\JwtToken;
use app\service\controller\RedisService;
use app\service\controller\Upload;
use think\Request;
use think\facade\View;

class Index extends Common
{

    public function index()
    {
        halt("后台首页");
    }

    //测试redis相关
    public function actionRedis()
    {
        $service = new RedisService();
        $res     = $service->set("test", "ok");

        halt($res);
    }

    public function upload(Request $request)
    {
        $upload = new Upload();
        $res = $upload->upload('video');
        dump($res);
        return View::fetch('upload');
    }

    public function CreateToken1()
    {
        $token = JwtToken::signToken(12);
        dump($token);
    }

    public function verifyToken1(Request $request)
    {
        $token = $request->param('token');
        $result = JwtToken::checkToken($token);

        dump($result);
    }
}
