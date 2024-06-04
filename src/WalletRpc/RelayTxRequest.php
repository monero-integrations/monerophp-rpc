<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Relay a transaction previously created with `"do_not_relay":true`.
 */
class RelayTxRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * transaction metadata returned from a `transfer` method with `get_tx_metadata` set to `true`.
     */
    #[Json]
    public string $hex;

    public static function create(string $hex): RpcRequest
    {
        $self = new self();
        $self->hex = $hex;
        return new RpcRequest('relay_tx', $self);
    }
}
