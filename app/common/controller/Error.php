<?php
declare (strict_types = 1);

namespace app\common\controller;

class Error extends Common
{
    public function __call($name, $arguments)
    {
        return $this->returnCode(10000);
    }
}