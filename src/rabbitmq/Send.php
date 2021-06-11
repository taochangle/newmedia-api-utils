<?php


namespace taoxin\utils\rabbitmq;


use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

/**
 * 发送方法
 *
 * @package taoxin\utils\rabbitmq
 */
class Send
{
    private AMQPStreamConnection $connection;
    private AMQPChannel $channel;
    private array $config;

    public function __construct($config = [])
    {
        if (empty($config)) {
            $this->config = [
                'host' => 'localhost',
                'port' => 5672,
                'user' => 'guest',
                'password' => 'guest',
            ];
        } else {
            $this->config = $config;
        }
        $this->connection = new AMQPStreamConnection($this->config['host'], $this->config['port'], $this->config['user'], $this->config['password']);
        $this->channel = $this->connection->channel();
    }

    /**
     * @param array $data 要推送的参数
     * @param string $queue queue名字
     * @return bool[]
     */
    public function push(array $data,string  $queue = 'my_queue'): array
    {
        $this->channel->queue_declare($queue, false, false, false, false);

        $msg = new AMQPMessage(json_encode($data));
        $this->channel->basic_publish($msg, '', 'hello');
        return ['success' => true];
    }


    /**
     * @throws \Exception
     */
    public function __destruct()
    {
        $this->channel->close();
        $this->connection->close();
    }
}