<?php

namespace EasyExchange\Binance\Wallet;

use EasyExchange\Binance\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 账户信息.
     *
     * @param int $recvWindow
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function account($recvWindow = 60000)
    {
        return $this->httpGet('/api/v3/account', compact('recvWindow'), 'SIGN');
    }

    /**
     * 获取所有币信息.
     * No sapi/wapi in testnet; only api endpoints available.
     *
     * @param int $recvWindow
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAll($recvWindow = 60000)
    {
        return $this->httpGet('/sapi/v1/capital/config/getall', compact('recvWindow'), 'SIGN');
    }

    /**
     * 查询每日资产快照.
     *
     * @param $params
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function accountSnapshot($params)
    {
        return $this->httpGet('/sapi/v1/accountSnapshot', $params, 'SIGN');
    }

    /**
     * 关闭站内划转.
     *
     * @param int $recvWindow
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function disableFastWithdrawSwitch($recvWindow = 60000)
    {
        return $this->httpPost('/sapi/v1/account/disableFastWithdrawSwitch', compact('recvWindow'), 'SIGN');
    }

    /**
     * 开启站内划转.
     *
     * @param int $recvWindow
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function enableFastWithdrawSwitch($recvWindow = 60000)
    {
        return $this->httpPost('/sapi/v1/account/enableFastWithdrawSwitch', compact('recvWindow'), 'SIGN');
    }

    /**
     * 提币-Submit a withdraw request.
     *
     * @param $params
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function withdrawApply($params)
    {
        return $this->httpPost('/sapi/v1/capital/withdraw/apply', $params, 'SIGN');
    }

    /**
     * 提币-提交提现请求.
     *
     * @param $params
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function withdraw($params)
    {
        return $this->httpPost('/wapi/v3/withdraw.html', $params, 'SIGN');
    }

    /**
     * 获取充值历史(支持多网络).
     *
     * @param $params
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function capitalDepositHistory($params)
    {
        return $this->httpGet('/sapi/v1/capital/deposit/hisrec', $params, 'SIGN');
    }

    /**
     * 获取充值历史.
     *
     * @param $params
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function depositHistory($params)
    {
        return $this->httpGet('/wapi/v3/depositHistory.html', $params, 'SIGN');
    }

    /**
     * 获取提币历史.
     *
     * @param $params
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function capitalWithdrawHistory($params)
    {
        return $this->httpGet('/sapi/v1/capital/withdraw/history', $params, 'SIGN');
    }

    /**
     * 获取提币历史.
     *
     * @param $params
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function withdrawHistory($params)
    {
        return $this->httpGet('/wapi/v3/withdrawHistory.html', $params, 'SIGN');
    }

    /**
     * 获取充值地址 (支持多网络).
     *
     * @param $params
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function capitalDepositAddress($params)
    {
        return $this->httpGet('/sapi/v1/capital/deposit/address', $params, 'SIGN');
    }

    /**
     * 获取充值地址.
     *
     * @param $params
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function depositAddress($params)
    {
        return $this->httpGet('/wapi/v3/depositAddress.html', $params, 'SIGN');
    }

    /**
     * 账户状态.
     *
     * @param int $recvWindow
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function accountStatus($recvWindow = 60000)
    {
        return $this->httpGet('/wapi/v3/accountStatus.html', compact('recvWindow'), 'SIGN');
    }

    /**
     * 账户API交易状态.
     *
     * @param int $recvWindow
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function apiTradingStatus($recvWindow = 60000)
    {
        return $this->httpGet('/wapi/v3/apiTradingStatus.html', compact('recvWindow'), 'SIGN');
    }

    /**
     * 小额资产转换BNB历史.
     *
     * @param int $recvWindow
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function userAssetDribbletLog($recvWindow = 60000)
    {
        return $this->httpGet('/wapi/v3/userAssetDribbletLog.html', compact('recvWindow'), 'SIGN');
    }

    /**
     * 小额资产转换BNB历史(SAPI).
     *
     * @param array $params
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function assetDribblet($params = [])
    {
        return $this->httpGet('/sapi/v1/asset/dribblet', $params, 'SIGN');
    }

    /**
     * 小额资产转换.
     *
     * @param $asset
     * @param int $recvWindow
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function assetDust($asset, $recvWindow = 60000)
    {
        return $this->httpPost('/sapi/v1/asset/dust', compact('asset', 'recvWindow'), 'SIGN');
    }

    /**
     * 资产利息记录.
     *
     * @param $params
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function assetDividend($params)
    {
        return $this->httpGet('/sapi/v1/asset/assetDividend', $params, 'SIGN');
    }

    /**
     * 上架资产详情.
     *
     * @param int $recvWindow
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function assetDetail($recvWindow = 60000)
    {
        return $this->httpGet('/wapi/v3/assetDetail.html', compact('recvWindow'), 'SIGN');
    }

    /**
     * 交易手续费率查询.
     *
     * @param string $symbol
     * @param int    $recvWindow
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function tradeFee($symbol = '', $recvWindow = 60000)
    {
        $request = [];
        if ($symbol) {
            $request['symbol'] = $symbol;
        }
        if ($recvWindow) {
            $request['recvWindow'] = $recvWindow;
        }

        return $this->httpGet('/wapi/v3/tradeFee.html', $request, 'SIGN');
    }

    /**
     * 交易手续费率查询(SAPI).
     *
     * @param string $symbol
     * @param int    $recvWindow
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function assetTradeFee($symbol = '', $recvWindow = 60000)
    {
        $request = [];
        if ($symbol) {
            $request['symbol'] = $symbol;
        }
        if ($recvWindow) {
            $request['recvWindow'] = $recvWindow;
        }

        return $this->httpGet('/sapi/v1/asset/tradeFee', $request, 'SIGN');
    }

    /**
     * 用户万向划转.
     *
     * @param $params
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function transfer($params)
    {
        return $this->httpPost('/sapi/v1/asset/transfer', $params, 'SIGN');
    }

    /**
     * 查询用户万向划转历史.
     *
     * @param $params
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function transferHistory($params)
    {
        return $this->httpGet('/sapi/v1/asset/transfer', $params, 'SIGN');
    }
}
