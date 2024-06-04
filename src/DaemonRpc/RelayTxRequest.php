<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Relay a list of transaction IDs.
 */
class RelayTxRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * @var string[] list of transaction IDs to relay
     */
    #[Json]
    public array $txids;

    /**
     * @param string[] $txids
     */
    public static function create(array $txids): RpcRequest
    {
        $self = new self();
        $self->txids = $txids;
        return new RpcRequest('relay_tx', $self);
    }
}
