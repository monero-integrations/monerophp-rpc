<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc;

use MoneroIntegrations\MoneroRpc\Request\RpcRequest;

/**
 * Look up information regarding hard fork voting and readiness.
 */
class HardForkInfoRequest
{
    public static function create(): RpcRequest
    {
        return new RpcRequest('hard_fork_info');
    }
}
