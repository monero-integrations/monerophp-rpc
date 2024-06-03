<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\RpcRequest;

/**
 * Get a list of user-defined account tags.
 */
class GetAccountTagsRequest
{
    public static function create(): RpcRequest
    {
        return new RpcRequest('get_account_tags');
    }
}
