## Coinbase Websocket

#### Introduction

See [binance websocket documentation](binance_websocket.md) for details

### Usage

1. Example

```php
<?php

use EasyExchange\Factory;
use EasyExchange\Kernel\Websocket\Handle;

class CoinbaseHandle implements Handle
{
    public function onConnect($connection, $params)
    {
        $connection->send(json_encode($params));
    }

    public function onMessage($connection, $data)
    {
        echo $data.PHP_EOL;
        // your logic ....
    }

    public function onError($connection, $code, $message)
    {
        echo "error: $message\n";
    }

    public function onClose($connection)
    {
        echo "connection closed\n";
    }
}

class Test
{
    public function ws()
    {
        $config = [
            'coinbase' => [
                'response_type' => 'array',
                'base_uri' => 'https://api.pro.coinbase.com',
                'ws_base_uri' => 'ws://ws-feed.pro.coinbase.com',
                'app_key' => 'your app key',
                'secret' => 'your secret',
            ],
        ];
        $app = Factory::coinbase($config['coinbase']);
        $params = [
            'product_ids' => [
                'ETH-USD',
                'ETH-EUR'
            ],
            'channels' => [
                'level2',
                'heartbeat',
                [
                    'name' => 'ticker',
                    'product_ids' => [
                        'ETH-BTC',
                        'ETH-USD'
                    ],
                ],
            ],
        ];
        $app->websocket->subscribe($params, new CoinbaseHandle());
    }
}

$tc = new Test();
$tc->ws();
```

2. Start script monitoring:`php test.php start`