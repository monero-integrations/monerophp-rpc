<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\RpcRequest;

/**
 * Save the wallet file.
 */
class StoreRequest
{
    public static function create(): RpcRequest
    {
        return new RpcRequest('store');
    }
}
