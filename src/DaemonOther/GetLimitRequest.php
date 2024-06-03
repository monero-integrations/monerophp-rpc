<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonOther;

use MoneroIntegrations\MoneroRpc\Request\OtherRpcRequest;
use MoneroIntegrations\MoneroRpc\Trait\EmptyOtherRpcRequest;

/**
 * Get daemon bandwidth limits.
 */
class GetLimitRequest extends OtherRpcRequest
{
    use EmptyOtherRpcRequest;
}
