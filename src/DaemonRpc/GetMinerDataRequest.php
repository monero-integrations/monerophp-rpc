<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc;

use MoneroIntegrations\MoneroRpc\Request\RpcRequest;

/**
 * Provide the necessary data to create a custom block template. They are used by p2pool.
 */
class GetMinerDataRequest
{
    public static function create(): RpcRequest
    {
        return new RpcRequest('get_miner_data');
    }
}
