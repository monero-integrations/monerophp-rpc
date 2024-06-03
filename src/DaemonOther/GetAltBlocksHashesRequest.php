<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonOther;

use MoneroIntegrations\MoneroRpc\Request\OtherRpcRequest;
use MoneroIntegrations\MoneroRpc\Trait\EmptyOtherRpcRequest;

/**
 * Get the known blocks hashes which are not on the main chain.
 */
class GetAltBlocksHashesRequest extends OtherRpcRequest
{
    use EmptyOtherRpcRequest;
}
