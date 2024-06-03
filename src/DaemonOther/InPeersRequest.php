<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonOther;

use MoneroIntegrations\MoneroRpc\Request\OtherRpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;

/**
 * Limit number of Incoming peers.
 */
class InPeersRequest extends OtherRpcRequest
{
    use JsonSerializeBigInt;

    /**
     * Max number of incoming peers
     */
    #[Json('in_peers')]
    public int $inPeers;

    public static function create(int $inPeers): OtherRpcRequest
    {
        $self = new self();
        $self->inPeers = $inPeers;
        return $self;
    }
}
