<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonOther;

use MoneroIntegrations\MoneroRpc\Request\OtherRpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;

/**
 * Limit number of Outgoing peers.
 */
class OutPeersRequest extends OtherRpcRequest
{
    use JsonSerializeBigInt;

    /**
     * Max number of outgoing peers
     */
    #[Json('out_peers')]
    public int $outPeers;

    public static function create(int $outPeers): OtherRpcRequest
    {
        $self = new self();
        $self->outPeers = $outPeers;
        return $self;
    }
}
