## 芝麻开门 Websocket 文档

#### 说明

详见[币安 websocket 文档](binance_websocket_cn.md)

1. 示例
```php
<?php

use EasyExchange\Factory;
use EasyExchange\Gate\Websocket\Handle;

class GateHandle extends Handle
{
}

class Test
{
    public function ws()
    {
        $config = [
            'gate' => [
                'response_type' => 'array',
                'base_uri' => 'https://api.gateio.ws',
                'ws_base_uri' => 'ws://api.gateio.ws',
                'app_key' => 'your app key',
                'secret' => 'your secret',
            ],
        ];
        $app = Factory::gate($config['gate']);
        $params = [
            'time' => time(),
            'channel' => 'spot.tickers',
            'payload' => ['BTC_USDT'],
        ];
        $app->websocket->subscribe($params, new GateHandle());
    }
}

$tc = new Test();
$tc->ws();
```

2. 启动脚本监听:`php test.php start`
