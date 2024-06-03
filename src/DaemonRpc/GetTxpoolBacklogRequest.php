<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc;

use MoneroIntegrations\MoneroRpc\Request\RpcRequest;

/**
 * Get all transaction pool backlog
 */
class GetTxpoolBacklogRequest
{
    public static function create(): RpcRequest
    {
        return new RpcRequest('get_txpool_backlog');
    }
}
