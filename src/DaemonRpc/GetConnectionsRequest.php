<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc;

use MoneroIntegrations\MoneroRpc\Request\RpcRequest;

/**
 * Retrieve information about incoming and outgoing connections to your node.
 */
class GetConnectionsRequest
{
    public static function create(): RpcRequest
    {
        return new RpcRequest('get_connections');
    }
}
