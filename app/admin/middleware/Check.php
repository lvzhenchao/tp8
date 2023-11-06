<?php
declare (strict_types = 1);

namespace app\admin\middleware;

class Check
{
    /**
     * 前置中间件处理请求
     *
     * @param \think\Request $request
     * @param \Closure       $next
     * @return Response
     */
    public function handle($request, \Closure $next)
    {

//        if (empty(session("admin_session")) && !preg_match('index/login', $request->pathinfo())) {
//            redirect("index/login");
//        }
        echo "前置--我是admin中间件，我在这里处理登录逻辑\n";
        return $next($request);
    }

//    public function handle($request, \Closure $next)
//    {
//
//        $response = $next($request);
//
//        echo "后置--我是admin中间件，我在这里处理登录逻辑\n";
//
//        return $response;
//    }
}
