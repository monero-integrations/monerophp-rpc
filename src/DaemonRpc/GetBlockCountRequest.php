<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc;

use MoneroIntegrations\MoneroRpc\Request\RpcRequest;

/**
 * Look up how many blocks are in the longest chain known to the node.
 */
class GetBlockCountRequest
{
    public static function create(): RpcRequest
    {
        return new RpcRequest('get_block_count');
    }
}
