<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\RpcRequest;

/**
 * Stop mining in the Monero daemon.
 */
class StopMiningRequest
{
    public static function create(): RpcRequest
    {
        return new RpcRequest('stop_mining');
    }
}
