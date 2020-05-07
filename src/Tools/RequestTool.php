<?php

namespace SHSign\Tools;

use Curl\Curl;
use SHSign\Exceptions\InvalidResponseException;

class RequestTool {

    /**
     * curl请求
     *
     * @param       $url
     *                   请求url
     * @param array $data
     *                   附加数据
     *
     * @return mixed|null
     * @throws \ErrorException
     * Author: DQ
     */
    public static function get($url, $data = [], $headers = []) {
        $request = new Curl();
        if (!empty($headers)) {
            $request->setHeaders($headers);
        }
        $request->setOpt(CURLOPT_SSL_VERIFYHOST, false);
        $request->setOpt(CURLOPT_SSL_VERIFYPEER, false);
        $request->setHeader('Content-Type', 'application/json');
        $request->setTimeout(3);
        $request->get($url, $data);
        $request->close();
        $content = null;
        if ($request->httpStatusCode != 200) {
            self::_handlerHttpResponse($request);
        } else {
            $content = $request->getRawResponse();
        }

        return $content;
    }

    /**
     * post 请求
     *
     * @param       $url
     * @param array $data
     * @param array $headers
     *
     * @return null
     * @throws \ErrorException
     * @throws \ListenRobot\Exceptions\InvalidResponseException
     * Author: DQ
     */
    public static function post($url, $data = [], $headers = []) {
        $request = new Curl();
        if (!empty($headers)) {
            $request->setHeaders($headers);
        }
        $request->setOpt(CURLOPT_SSL_VERIFYHOST, false);
        $request->setOpt(CURLOPT_SSL_VERIFYPEER, false);
        $request->setTimeout(3);
        $request->post($url, $data);
        $request->close();
        $content = null;
        if ($request->httpStatusCode != 200) {
            self::_handlerHttpResponse($request);
        } else {
            $content = $request->getRawResponse();
        }

        return $content;
    }

    /**
     * put 请求
     *
     * @param       $url
     * @param array $data
     * @param array $headers
     *
     * @return null
     * @throws \ErrorException
     * @throws \ListenRobot\Exceptions\InvalidResponseException
     * Author: DQ
     */
    public static function put($url, $data = [], $headers = []) {
        $request = new Curl();
        if (!empty($headers)) {
            $request->setHeaders($headers);
        }
        $request->setHeader('Content-Type', 'application/json');
        $request->setTimeout(3);
        $request->put($url, $data);
        $request->close();
        $content = null;
        if ($request->httpStatusCode != 200) {
            self::_handlerHttpResponse($request);
        } else {
            $content = $request->getRawResponse();
        }

        return $content;
    }

    /**
     * del 请求
     *
     * @param       $url
     * @param array $data
     * @param array $headers
     *
     * @return null
     * @throws \ErrorException
     * @throws \ListenRobot\Exceptions\InvalidResponseException
     * Author: DQ
     */
    public static function del($url, $data = [], $headers = []) {
        $request = new Curl();
        if (!empty($headers)) {
            $request->setHeaders($headers);
        }
        $request->setHeader('Content-Type', 'application/json');
        $request->setTimeout(3);
        $request->delete($url, $data);
        $request->close();
        $content = null;
        if ($request->httpStatusCode != 200) {
            self::_handlerHttpResponse($request);
        } else {
            $content = $request->getRawResponse();
        }

        return $content;
    }

    /**
     * 详情体处理
     *
     * @param \Curl\Curl $request
     *
     * @throws \ListenRobot\Exceptions\InvalidResponseException
     * Author: DQ
     */
    private static function _handlerHttpResponse(Curl $request) {
        $msg = json_decode($request->getRawResponse(), true);
        $str = isset($msg['message']) ? $msg['message'] : '';
        switch ($msg['code']) {
            case -1:
                throw new InvalidResponseException('认证失败.' . $str, -1);
                break;
            case -2:
                throw new InvalidResponseException('参数不能为空.' . $str, -2);
                break;
            case -10:
                throw new InvalidResponseException('操作失败.' . $str, -10);
                break;
        }
    }

}