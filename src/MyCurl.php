<?php

namespace taoxin\utils;

use Curl\Curl;


/**
 * HTTP客户端
 *
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
     *
     * @param string $url 请求地址
     * @param        $data
     * @param array $headers
     *
     * @return array
     */
    public function post(string $url = '', $data = null, array $headers = []): array
    {
        !empty($headers) && $this->curl->setHeaders($headers);
        $this->curl->setTimeout(300);
        $this->curl->post($url, $data);
        if ($this->curl->error) {
            return [
                'success' => false,
                'message' => $this->curl,
                'data' => null
            ];
        }
        return [
            'success' => true,
            'message' => '',
            'data' => Tools::object2array($this->curl->response)
        ];
    }

    /**
     * get 请求
     *
     * @param string $url 请求地址
     * @param array $data 请求参数
     * @param array $headers
     *
     * @return array
     */
    public function get(string $url = '', array $data = [], array $headers = []): array
    {
        !empty($headers) && $this->curl->setHeaders($headers);
        $this->curl->get($url, $data);
        if ($this->curl->error) {
            return [
                'success' => false,
                'message' => $this->curl,
                'data' => null
            ];
        }
        return [
            'success' => true,
            'message' => '',
            'data' => Tools::object2array($this->curl->response)
        ];
    }

    public function __destruct()
    {
        $this->curl->close();
    }
}