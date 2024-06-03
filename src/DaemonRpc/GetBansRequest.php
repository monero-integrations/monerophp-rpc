<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc;

use MoneroIntegrations\MoneroRpc\Request\RpcRequest;

/**
 * Get list of banned IPs.
 */
class GetBansRequest
{
    public static function create(): RpcRequest
    {
        return new RpcRequest('get_bans');
    }
}
