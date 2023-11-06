<?php
declare (strict_types = 1);

namespace app\service\controller;

use think\Request;

class Upload {

    public function upload($files_type = "files")
    {
        $files = request()->file('file');

        if (!$files) {
            return [];
        }

        $originalName = $files->getOriginalName();
        $ext = pathinfo($originalName, PATHINFO_EXTENSION);

        $object = $files_type.'/'.date("Ymd"). '/'.$files->sha1().'.'.$ext;
        $filePath = $files->getPathname();

        $oss = new AliOSS();

        if ($files->getSize() > 10*1024*1024) {
            $res = $oss->multiUpload($object, $filePath);
        } else {
            $res = $oss->upload($object, $filePath);
        }

        if (isset($res['info']['url'])) {
            $return['absolute_url']  = $res['info']['url'];
            $return['relative_path'] = $object;
            return $return;
        } else {
            return $res;
        }

    }
}