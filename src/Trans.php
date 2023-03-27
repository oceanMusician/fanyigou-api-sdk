<?php
/**
 * Trans.php
 * Create on 2023/3/24 11:09
 * Create by lihailiang@fanyigou.com
 */

namespace Fanyigou\ApiSdkPhp;

class Trans extends Api
{
    /**
     * 上传
     * @param array $params
     * @param string $filePath
     * @return mixed
     * @throws DispatchException
     */
    public function uploadTranslate(array $params, string $filePath)
    {
        return $this->request('uploadTranslate', $params, $filePath);
    }


    /**
     * 下载
     * @param array $params
     * @return mixed
     * @throws DispatchException
     */
    public function downloadFile(array $params)
    {
        return $this->request('downloadFile', $params);
    }

    /**
     * 获取进度
     * @param array$params
     * @return mixed
     * @throws DispatchException
     */
    public function queryTransProgress(array $params)
    {
        return $this->request('queryTransProgress', $params);
    }

    /**
     * 上传文件检测页数
     * @param string $filePath
     * @return mixed
     * @throws DispatchException
     */
    public function detectDocPage(string $filePath)
    {
        return $this->request('detectDocPage', [], $filePath);
    }

    /**
     * 检测页数文件提交翻译
     * @param array $params
     * @return mixed
     * @throws DispatchException
     */
    public function submitForDetectDoc(array $params)
    {
        return $this->request('submitForDetectDoc', $params);
    }

    /**
     * 文档转换
     * @param array $params
     * @param string $filePath
     * @return mixed
     * @throws DispatchException
     */
    public function convert(array $params, string $filePath)
    {
        return $this->request('convert', $params, $filePath);
    }

    /**
     * 获取账户信息
     * @return mixed
     * @throws DispatchException
     */
    public function getAccount()
    {
        return $this->request('getAccount');
    }

    /**
     * 文字翻译
     * @param array $params
     * @return mixed
     * @throws DispatchException
     */
    public function text(array $params)
    {
        return $this->request('trans', $params);
    }

    /**
     * 图片上传
     * @param array $params
     * @param string $filePath
     * @return mixed
     * @throws DispatchException
     */
    public function uploadTranslateImage(array $params, string $filePath)
    {
        return $this->request('image/uploadTranslateImage', $params, $filePath);
    }

    /**
     * 图片翻译获取进度
     * @param array $params
     * @return mixed
     * @throws DispatchException
     */
    public function queryImageTransProgress(array $params)
    {
        return $this->request('image/queryImageTransProgress', $params);
    }

    /**
     * 图片翻译下载
     * @param array $params
     * @return mixed
     * @throws DispatchException
     */
    public function downloadImage(array $params)
    {
        return $this->request('image/downloadImage', $params);
    }
}