## 欧易 Websocket 文档

#### 说明

> DataTest 必须是实现了 EasyExchange\Kernel\Websocket\DataHandle 接口的对象

> DataHandle 里的 handle 方法接收两个参数，一个是 workerman 的 connection 客户端连接对象，一个是服务端返回的数据

1. 示例
```php
<?php

use EasyExchange\Factory;
use EasyExchange\Kernel\Websocket\DataHandle;
use Workerman\Timer;

class DataTest implements DataHandle
{
    public function handle($connection, $data)
    {
        // your logic ....
        echo $data.PHP_EOL;
        $time_interval = 10;
        $connect_time = time();
        if ('pong' != $data) {
            $connection->timer_id = Timer::add($time_interval, function () use ($connection, $connect_time) {
                echo $connect_time.PHP_EOL;
                $connection->send('ping');
            });
        } else {
            // 删除定时器
            Timer::del($connection->timer_id);
        }
    }
}

class Test
{
    public function ws()
    {
        $config = [
            'okex' => [
                'response_type' => 'array',
                'base_uri' => 'https://www.okex.com',
                'ws_base_uri' => 'ws://ws.okex.com:8443',
                'app_key' => 'your app key',
                'secret' => 'your secret',
                'passphrase' => 'your passphrase',
                'x-simulated-trading' => 1,
            ],
        ];
        $app = Factory::okex($config['okex']);
        $params = [
            'args' => [
//                [
//                    'channel' => 'instruments',
//                    'instType' => 'FUTURES', // Required
//                    'instType' => 'SPOT', // Required
//                ],
                [
                    'channel' => 'tickers',
                    'instId' => 'BTT-BTC', // Required
                ],
            ],
        ];
        $handle = new DataTest();
        $app->websocket->subscribe($params, $handle);
    }
}

$tc = new Test();
$tc->ws();
```

2. 启动脚本监听:`php test.php start`