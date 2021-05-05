<?php

/*
 * This file is part of the stingbo/easyexchange.
 *
 * (c) sting bo <lianbo.wan@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyExchange;

use EasyExchange\Kernel\ServiceContainer;

/**
 * Class Factory.
 *
 * @method static \EasyExchange\Binance\Application     binance(array $config)
 * @method static \EasyExchange\Bittrex\Application     bittrex(array $config)
 * @method static \EasyExchange\Huobi\Application       huobi(array $config)
 * @method static \EasyExchange\Okex\Application        okex(array $config)
 * @method static \EasyExchange\Gate\Application        gate(array $config)
 * @method static \EasyExchange\Coinbase\Application    coinbase(array $config)
 */
class Factory
{
    public static function make(string $name, array $config): ServiceContainer
    {
        $namespace = Kernel\Support\Str::studly($name);
        $application = "\\EasyExchange\\{$namespace}\\Application";

        return new $application($config);
    }

    /**
     * Dynamically pass methods to the application.
     *
     * @return mixed
     */
    public static function __callStatic(string $name, array $arguments): ServiceContainer
    {
        return self::make($name, ...$arguments);
    }
}
