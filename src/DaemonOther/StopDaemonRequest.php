<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonOther;

use MoneroIntegrations\MoneroRpc\Request\OtherRpcRequest;
use MoneroIntegrations\MoneroRpc\Trait\EmptyOtherRpcRequest;

/**
 * Send a command to the daemon to safely disconnect and shut down.
 */
class StopDaemonRequest extends OtherRpcRequest
{
    use EmptyOtherRpcRequest;
}
