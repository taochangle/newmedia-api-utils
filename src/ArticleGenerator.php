<?php


namespace taoxin\utils;


/**
 * 文章生成器
 * @package taoxin\utils
 */
class ArticleGenerator
{
    /**
     * @param string $title 文章标题
     * @param int $length 文章长度
     * @return string|string[]
     */
    public function generator(string $title = '你好骚啊', int $length = 1000)
    {
        $body = "";
        $data = dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'data.json';
        $data = json_decode(file_get_contents($data), true);
        while (strlen($body) / 3 < $length) {
            $num = rand(0, 100);
            if ($num < 10) {
                $body .= "\r\n";
            } elseif ($num < 20) {
                $body .= $data["famous"][array_rand($data["famous"], 1)];
                $replace = [$data["before"][array_rand($data["before"], 1)], $data['after'][array_rand($data['after'], 1)]];
                $find = ['a', 'b'];
                $body = str_replace($find, $replace, $body);
            } else {
                $body .= $data["bosh"][array_rand($data["bosh"], 1)];
            }
            $body = str_replace("x", $title, $body);
        }
        return $body;
    }
}