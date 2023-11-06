<?php
declare (strict_types = 1);

namespace app\index\middleware;

class Before
{
    /**
     * 处理请求
     *
     * @param \think\Request $request
     * @param \Closure       $next
     * @return Response
     */
    public function handle($request, \Closure $next)
    {
        // 添加中间件执行代码
        echo '得到name=' . $request->param('name') . '<br>';

        if ($request->param('name') == 'qipa250') {
            echo '你好我是奇葩250';
        } else {
            echo '你好我不是奇葩250';
        }
        echo '<br>';
        echo '走到app\index\middleware\Before类的handle方法了';

        return $next($request);
    }
}
