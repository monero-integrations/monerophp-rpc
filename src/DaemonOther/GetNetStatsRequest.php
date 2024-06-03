<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonOther;

use MoneroIntegrations\MoneroRpc\Request\OtherRpcRequest;
use MoneroIntegrations\MoneroRpc\Trait\EmptyOtherRpcRequest;

/**
 * Get some networking information from the daemon
 */
class GetNetStatsRequest extends OtherRpcRequest
{
    use EmptyOtherRpcRequest;
}
