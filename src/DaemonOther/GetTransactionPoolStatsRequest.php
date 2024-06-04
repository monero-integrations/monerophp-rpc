<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonOther;

use MoneroIntegrations\MoneroRpc\Request\OtherRpcRequest;
use MoneroIntegrations\MoneroRpc\Trait\EmptyOtherRpcRequest;

/**
 * Get the transaction pool statistics.
 */
class GetTransactionPoolStatsRequest extends OtherRpcRequest
{
    use EmptyOtherRpcRequest;
}
