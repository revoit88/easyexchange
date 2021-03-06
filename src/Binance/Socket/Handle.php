<?php

namespace EasyExchange\Binance\Socket;

use Workerman\Connection\AsyncTcpConnection;

class Handle implements \EasyExchange\Kernel\Socket\Handle
{
    private $config;

    public function getConnection($config, $params)
    {
        $this->config = $config;

        $base_uri = $config['websocket']['base_uri'].'/ws';
        echo $base_uri.PHP_EOL;

        $connection = new AsyncTcpConnection($base_uri);
        $connection->transport = 'ssl';

        return $connection;
    }

    public function onConnect($connection, $client, $params)
    {
        echo 'connect:-----------------'.PHP_EOL;
        $connection->send(json_encode($params));
    }

    public function onMessage($connection, $client, $params, $data)
    {
        echo 'msg:--------------------------------'.PHP_EOL;
        echo $data.PHP_EOL;
        $result = json_decode($data, true) ?? [];

        // save subscribe data
        if (isset($result['id']) && null == $result['result']) {
            $key = 'binance_id_'.$result['id'];
            $sub = $client->{$key};
            do {
                $new_subs = $old_subs = $client->binance_sub_old;
                $new_subs[] = $sub;
            } while (!$client->cas('binance_sub_old', $old_subs, $new_subs));
        }

        // save data
        if ($result && is_array($result) && isset($result['e'])) {
            $channel = $result['e'] ?? '';
            if (!$channel) {
                return true;
            }
            $key = 'gate_list_'.$channel;
            $old_list = $client->{$key} ?? [];
            if (!$old_list) {
                $client->add($key, [$data]);
            } else {
                $max_size = $this->config['websocket']['max_size'] ?? 100;
                $max_size = ($max_size > 1000 || $max_size <= 0) ? 100 : $max_size;
                do {
                    $new_list = $old_list = $client->{$key};
                    if (count($new_list) >= $max_size) {
                        array_unshift($new_list, $data);
                        array_pop($new_list);
                    } else {
                        array_unshift($new_list, $data);
                    }
                } while (!$client->cas($key, $old_list, $new_list));
            }
        }

        return true;
    }

    public function onError($connection, $client, $code, $message)
    {
        echo 'error---------: code:'.$code.",message:$message\n";
    }

    public function onClose($connection, $client)
    {
        echo "connection closed???now reconnect\n";
        $connection->reConnect(1);

        $client->binance_sub = $client->binance_sub_old;
        $client->binance_sub_old = [];
    }
}
