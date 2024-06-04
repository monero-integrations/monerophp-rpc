<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonOther;

use MoneroIntegrations\MoneroRpc\Request\OtherRpcRequest;
use Square\Pjson\Json;

/**
 * Remove blocks from the blockchain
 */
class PopBlocksRequest extends OtherRpcRequest
{
    #[Json('nblocks')]
    public int $numberOfBlocks;

    public static function create(int $numberOfBlocks): OtherRpcRequest
    {
        $self = new self();
        $self->numberOfBlocks = $numberOfBlocks;
        return $self;
    }
}
