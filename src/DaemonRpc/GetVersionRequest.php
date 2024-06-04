<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc;

use MoneroIntegrations\MoneroRpc\Request\RpcRequest;

/**
 * Give the node current version
 */
class GetVersionRequest
{
    public static function create(): RpcRequest
    {
        return new RpcRequest('get_version');
    }
}
