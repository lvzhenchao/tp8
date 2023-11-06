<?php
declare (strict_types = 1);

namespace app\common\controller;

use app\BaseController;

class Common extends BaseController
{

    static public function miss()
    {
        return "404 哦 ";
    }

    static public function returnCode($code = '', $data = [], $msg = '')
    {
        $return_data = [
            'code' => '500',
            'msg'  => '未定义消息',
            'data' => $code == 1001 ? $data : [],
        ];

        if (empty($code)){
            return $return_data;
        }

        $return_data['code'] = $code;
        if(!empty($msg)){
            $return_data['msg'] = $msg;
        }else if (isset(ReturnCode::$return_code[$code]) ) {
            $return_data['msg'] = ReturnCode::$return_code[$code];
        }
        return json_encode($return_data);
    }

}
