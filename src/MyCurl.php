<?php

namespace taoxin\utils;

use Curl\Curl;


/**
 * HTTP客户端
 * @package taoxin\utils
 */
class MyCurl
{
    private Curl $curl;

    public function __construct()
    {
        $this->curl = new Curl();
    }

    /**
     * post 请求
     * @param string $url 请求地址
     * @param array $data 请求参数
     * @param array $headers
     * @return array
     */
    public function post(string $url = '', array $data = [], array $headers = []): array
    {
        !empty($headers) && $this->curl->setHeaders($headers);
        $this->curl->post($url, $data);
        if ($this->curl->error) {
            return [
                'success' => false,
                'message' => '请求错误，' . $this->curl->errorMessage,
                'data' => null
            ];
        }
        return [
            'success' => true,
            'message' => '',
            'data' => $this->curl->response
        ];
    }

    /**
     * get 请求
     * @param string $url 请求地址
     * @param array $data 请求参数
     * @param array $headers
     * @return array
     */
    public function get(string $url = '', array $data = [], array $headers = []): array
    {
        !empty($headers) && $this->curl->setHeaders($headers);
        $this->curl->get($url, $data);
        if ($this->curl->error) {
            return [
                'success' => false,
                'message' => '请求错误，' . $this->curl->errorMessage,
                'data' => null
            ];
        }
        return [
            'success' => true,
            'message' => '',
            'data' => $this->curl->response
        ];
    }
}