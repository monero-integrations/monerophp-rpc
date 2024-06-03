<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\RpcRequest;

/**
 * Returns the wallet's current block height.
 */
class GetHeightRequest
{
    public static function create(): RpcRequest
    {
        return new RpcRequest('get_height');
    }
}
