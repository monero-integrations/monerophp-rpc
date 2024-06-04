<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonOther;

use MoneroIntegrations\MoneroRpc\Request\OtherRpcRequest;
use MoneroIntegrations\MoneroRpc\Trait\EmptyOtherRpcRequest;

/**
 * Stop mining on the daemon.
 */
class StopMiningRequest extends OtherRpcRequest
{
    use EmptyOtherRpcRequest;
}
