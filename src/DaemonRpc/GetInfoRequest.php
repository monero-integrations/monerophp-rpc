<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc;

use MoneroIntegrations\MoneroRpc\Request\RpcRequest;

/**
 * Retrieve general information about the state of your node and the network.
 */
class GetInfoRequest
{
    public static function create(): RpcRequest
    {
        return new RpcRequest('get_info');
    }
}
