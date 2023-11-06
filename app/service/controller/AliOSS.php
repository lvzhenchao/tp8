<?php
declare (strict_types = 1);

namespace app\service\controller;
use app\Request;
use OSS\Core\OssException;
use OSS\OssClient;

class AliOSS
{
    public static $oss;

    public function __construct()
    {

        $accessKeyId = config('oss.accessKeyId');
        $accessKeySecret = config('oss.accessKeySecret');
        $endpoint  = config('oss.endPoint');
        self::$oss = new OssClient($accessKeyId, $accessKeySecret, $endpoint);

    }


    public function upload($object, $filepath)
    {
        $bucket = config('oss.bucket');

        try {
            $res = self::$oss->uploadFile($bucket, $object, $filepath);
        } catch (OssException $e) {
            halt($e->getMessage());

        }
        return $res;
    }

    public function multiUpload($object, $filepath)
    {
        $bucket = config('oss.bucket');

        $options = array(
            OssClient::OSS_CHECK_MD5 => true,
            OssClient::OSS_PART_SIZE => 1,
        );

        try {
            $res = self::$oss->multiuploadFile($bucket, $object, $filepath, $options);
        } catch (OssException $e) {
            halt($e->getMessage());
        }
        return $res;
    }


}