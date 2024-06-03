<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonOther;

use MoneroIntegrations\MoneroRpc\Request\OtherRpcRequest;
use MoneroIntegrations\MoneroRpc\Trait\EmptyOtherRpcRequest;

/**
 * Get the mining status of the daemon.
 */
class MiningStatusRequest extends OtherRpcRequest
{
    use EmptyOtherRpcRequest;
}
