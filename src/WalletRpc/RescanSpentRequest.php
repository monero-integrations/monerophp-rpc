<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\RpcRequest;

/**
 * Rescan the blockchain for spent outputs.
 */
class RescanSpentRequest
{
    public static function create(): RpcRequest
    {
        return new RpcRequest('rescan_spent');
    }
}
