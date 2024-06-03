<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\RpcRequest;

/**
 * Close the currently opened wallet, after trying to save it.
 */
class CloseWalletRequest
{
    public static function create(): RpcRequest
    {
        return new RpcRequest('close_wallet');
    }
}
