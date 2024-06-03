<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonOther;

use MoneroIntegrations\MoneroRpc\Request\OtherRpcRequest;
use MoneroIntegrations\MoneroRpc\Trait\EmptyOtherRpcRequest;

/**
 * Save the blockchain. The blockchain does not need saving and is always saved when modified,
 * however it does a sync to flush the filesystem cache onto the disk for safety purposes against Operating System or Hardware crashes.
 */
class SaveBlockchainRequest extends OtherRpcRequest
{
    use EmptyOtherRpcRequest;
}
