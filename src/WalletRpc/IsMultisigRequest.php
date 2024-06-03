<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\RpcRequest;

/**
 * Check if a wallet is a multisig one.
 */
class IsMultisigRequest
{
    public static function create(): RpcRequest
    {
        return new RpcRequest('is_multisig');
    }
}
