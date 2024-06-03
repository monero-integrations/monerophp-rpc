<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc;

use MoneroIntegrations\MoneroRpc\Request\RpcRequest;

/**
 * Get synchronisation informations
 */
class SyncInfoRequest
{
    public static function create(): RpcRequest
    {
        return new RpcRequest('sync_info');
    }
}
