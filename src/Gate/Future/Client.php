<?php

namespace EasyExchange\Gate\Future;

use EasyExchange\Gate\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * List all futures contracts.
     *
     * @param $settle
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function contracts($settle)
    {
        return $this->httpGet(sprintf('/api/v4/futures/%s/contracts', $settle));
    }

    /**
     * Get a single contract.
     *
     * @param $settle
     * @param $contract
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function contract($settle, $contract)
    {
        return $this->httpGet(sprintf('/api/v4/futures/%s/contracts/%s', $settle, $contract));
    }

    /**
     * Futures order book.
     *
     * @param $settle
     * @param $params
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function depth($settle, $params)
    {
        return $this->httpGet(sprintf('/api/v4/futures/%s/order_book', $settle), $params);
    }

    /**
     * Futures trading history.
     *
     * @param $settle
     * @param $params
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function trades($settle, $params)
    {
        return $this->httpGet(sprintf('/api/v4/futures/%s/trades', $settle), $params);
    }

    /**
     * Get futures candlesticks.
     *
     * @param $settle
     * @param $params
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function kline($settle, $params)
    {
        return $this->httpGet(sprintf('/api/v4/futures/%s/candlesticks', $settle), $params);
    }

    /**
     * List futures tickers.
     *
     * @param $settle
     * @param $contract
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function tickers($settle, $contract)
    {
        return $this->httpGet(sprintf('/api/v4/futures/%s/tickers', $settle), compact('contract'));
    }

    /**
     * Funding rate history.
     *
     * @param $settle
     * @param $params
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function fundingRateHistory($settle, $params)
    {
        return $this->httpGet(sprintf('/api/v4/futures/%s/funding_rate', $settle), $params);
    }

    /**
     * Futures insurance balance history.
     *
     * @param $settle
     * @param string $limit
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function insuranceHistory($settle, $limit = '')
    {
        return $this->httpGet(sprintf('/api/v4/futures/%s/insurance', $settle), compact('limit'));
    }

    /**
     * Futures stats.
     *
     * @param $settle
     * @param $params
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function contractStats($settle, $params)
    {
        return $this->httpGet(sprintf('/api/v4/futures/%s/contract_stats', $settle), $params);
    }

    /**
     * Retrieve liquidation history.
     *
     * @param $settle
     * @param array $params
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function liquidationOrders($settle, $params = [])
    {
        return $this->httpGet(sprintf('/api/v4/futures/%s/liq_orders', $settle), $params);
    }

    /**
     * Query futures account.
     *
     * @param $settle
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function accounts($settle)
    {
        return $this->httpGet(sprintf('/api/v4/futures/%s/accounts', $settle), [], 'SIGN');
    }

    /**
     * Query account book.
     *
     * @param $settle
     * @param array $params
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function accountHistory($settle, $params = [])
    {
        return $this->httpGet(sprintf('/api/v4/futures/%s/account_book', $settle), $params, 'SIGN');
    }

    /**
     * List all positions of a user.
     *
     * @param $settle
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function positions($settle)
    {
        return $this->httpGet(sprintf('/api/v4/futures/%s/positions', $settle), [], 'SIGN');
    }

    /**
     * Get single position.
     *
     * @param $settle
     * @param $contract
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function position($settle, $contract)
    {
        return $this->httpGet(sprintf('/api/v4/futures/%s/positions/%s', $settle, $contract), [], 'SIGN');
    }

    /**
     * Update position margin.
     *
     * @param $settle
     * @param $contract
     * @param $change
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function modifyPositionMargin($settle, $contract, $change)
    {
        return $this->httpPostJson(sprintf('/api/v4/futures/%s/positions/%s/margin', $settle, $contract), [], compact('change'), 'SIGN');
    }

    /**
     * Update position leverage.
     *
     * @param $settle
     * @param $contract
     * @param $leverage
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function modifyPositionLeverage($settle, $contract, $leverage)
    {
        return $this->httpPostJson(sprintf('/api/v4/futures/%s/positions/%s/leverage', $settle, $contract), [], compact('leverage'), 'SIGN');
    }

    /**
     * Update position risk limit.
     *
     * @param $settle
     * @param $contract
     * @param $risk_limit
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function modifyPositionRiskLimit($settle, $contract, $risk_limit)
    {
        return $this->httpPostJson(sprintf('/api/v4/futures/%s/positions/%s/risk_limit', $settle, $contract), [], compact('risk_limit'), 'SIGN');
    }

    /**
     * Enable or disable dual mode.
     *
     * @param $settle
     * @param $dual_mode
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function setDualMode($settle, $dual_mode)
    {
        return $this->httpPostJson(sprintf('/api/v4/futures/%s/dual_mode', $settle), [], compact('dual_mode'), 'SIGN');
    }

    /**
     * Retrieve position detail in dual mode.
     *
     * @param $settle
     * @param $contract
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function dualCompPosition($settle, $contract)
    {
        return $this->httpGet(sprintf('/api/v4/futures/%s/dual_comp/positions/%s', $settle, $contract), [], 'SIGN');
    }

    /**
     * Update position margin in dual mode.
     *
     * @param $settle
     * @param $contract
     * @param $change
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function modifyDualCompPositionMargin($settle, $contract, $change)
    {
        return $this->httpPostJson(sprintf('/api/v4/futures/%s/dual_comp/positions/%s/margin', $settle, $contract), [], compact('change'), 'SIGN');
    }

    /**
     * Update position leverage in dual mode.
     *
     * @param $settle
     * @param $contract
     * @param $leverage
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function modifyDualCompPositionLeverage($settle, $contract, $leverage)
    {
        return $this->httpPostJson(sprintf('/api/v4/futures/%s/dual_comp/positions/%s/leverage', $settle, $contract), [], compact('leverage'), 'SIGN');
    }

    /**
     * Update position risk limit in dual mode.
     *
     * @param $settle
     * @param $contract
     * @param $risk_limit
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function modifyDualCompPositionRiskLimit($settle, $contract, $risk_limit)
    {
        return $this->httpPostJson(sprintf('/api/v4/futures/%s/dual_comp/positions/%s/risk_limit', $settle, $contract), [], compact('risk_limit'), 'SIGN');
    }

    /**
     * Create a futures order.
     *
     * @param $settle
     * @param $params
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function order($settle, $params)
    {
        return $this->httpPostJson(sprintf('/api/v4/futures/%s/orders', $settle), $params, [], 'SIGN');
    }

    /**
     * List futures orders.
     *
     * @param $settle
     * @param $params
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function orders($settle, $params)
    {
        return $this->httpGet(sprintf('/api/v4/futures/%s/orders', $settle), $params, 'SIGN');
    }

    /**
     * Cancel all open orders matched.
     *
     * @param $settle
     * @param $params
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function cancelOrders($settle, $params)
    {
        return $this->httpDelete(sprintf('/api/v4/futures/%s/orders', $settle), $params, 'SIGN');
    }

    /**
     * Cancel a single order.
     *
     * @param $settle
     * @param $order_id
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function cancelOrder($settle, $order_id)
    {
        return $this->httpDelete(sprintf('/api/v4/futures/%s/orders/%s', $settle, $order_id), [], 'SIGN');
    }

    /**
     * Get a single order.
     *
     * @param $settle
     * @param $order_id
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($settle, $order_id)
    {
        return $this->httpGet(sprintf('/api/v4/futures/%s/orders/%s', $settle, $order_id), [], 'SIGN');
    }

    /**
     * List personal trading history.
     *
     * @param $settle
     * @param $params
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function myTrades($settle, $params)
    {
        return $this->httpGet(sprintf('/api/v4/futures/%s/my_trades', $settle), $params, 'SIGN');
    }

    /**
     * List position close history.
     *
     * @param $settle
     * @param $params
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function positionClose($settle, $params)
    {
        return $this->httpGet(sprintf('/api/v4/futures/%s/position_close', $settle), $params, 'SIGN');
    }

    /**
     * List liquidation history.
     *
     * @param $settle
     * @param $params
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function forceLiquidationRec($settle, $params)
    {
        return $this->httpGet(sprintf('/api/v4/futures/%s/liquidates', $settle), $params, 'SIGN');
    }

    /**
     * Create a price-triggered order.
     *
     * @param $settle
     * @param $params
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function priceOrder($settle, $params)
    {
        return $this->httpPostJson(sprintf('/api/v4/futures/%s/price_orders', $settle), $params, [], 'SIGN');
    }

    /**
     * List all auto orders.
     *
     * @param $settle
     * @param $params
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function priceOrders($settle, $params)
    {
        return $this->httpGet(sprintf('/api/v4/futures/%s/price_orders', $settle), $params, 'SIGN');
    }

    /**
     * Cancel all open orders.
     *
     * @param $settle
     * @param $contract
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function cancelPriceOrders($settle, $contract)
    {
        return $this->httpDelete(sprintf('/api/v4/futures/%s/price_orders', $settle), compact('contract'), 'SIGN');
    }

    /**
     * Get a single order.
     *
     * @param $settle
     * @param $order_id
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getPriceOrder($settle, $order_id)
    {
        return $this->httpGet(sprintf('/api/v4/futures/%s/price_orders/%s', $settle, $order_id), [], 'SIGN');
    }

    /**
     * Cancel a single order.
     *
     * @param $settle
     * @param $order_id
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function cancelPriceOrder($settle, $order_id)
    {
        return $this->httpDelete(sprintf('/api/v4/futures/%s/price_orders/%s', $settle, $order_id), [], 'SIGN');
    }
}
