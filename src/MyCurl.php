<?php


class MyCurl
{
    /**
     * post 请求
     * @param string $url 请求地址
     * @param array $data 请求参数
     * @return array
     */
    public function post($url = '', $data = [], $headers = [])
    {
        $curl = new \Curl\Curl();
        !empty($headers) && $curl->setHeaders($headers);
        $curl->post($url, $data);
        if ($curl->error) {
            return [
                'success' => false,
                'message' => '请求错误，' . $curl->errorMessage,
                'data' => null
            ];
        }
        return [
            'success' => true,
            'message' => '',
            'data' => $curl->response
        ];
    }
}