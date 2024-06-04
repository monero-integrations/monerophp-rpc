<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc;

use MoneroIntegrations\MoneroRpc\Request\RpcRequest;

/**
 * Display alternative chains seen by the node.
 */
class GetAlternateChainsRequest
{
    public static function create(): RpcRequest
    {
        return new RpcRequest('get_alternate_chains');
    }
}
