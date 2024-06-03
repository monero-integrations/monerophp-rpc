<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\RpcRequest;

/**
 * Get a list of available languages for your wallet's seed.
 */
class GetLanguagesRequest
{
    public static function create(): RpcRequest
    {
        return new RpcRequest('get_languages');
    }
}
