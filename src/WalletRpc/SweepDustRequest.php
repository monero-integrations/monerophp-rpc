<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Send all dust outputs back to the wallet's, to make them easier to spend (and mix).
 */
class SweepDustRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Return the transaction keys after sending.
     */
    #[Json('get_tx_keys', omit_empty: true)]
    public ?bool $getTxKeys;

    /**
     * If true, the newly created transaction will not be relayed to the monero network. (
     * When omitted the default value is false
     */
    #[Json('do_not_relay', omit_empty: true)]
    public ?bool $doNotRelay;

    /**
     * Return the transactions as hex string after sending. (
     * When omitted the default value is false
     */
    #[Json('get_tx_hex', omit_empty: true)]
    public ?bool $getTxHex;

    /**
     * Return list of transaction metadata needed to relay the transfer later. (
     * When omitted the default value is false
     */
    #[Json('get_tx_metadata', omit_empty: true)]
    public ?bool $getTxMetadata;

    public static function create(
        ?bool $getTxKeys = null,
        ?bool $doNotRelay = null,
        ?bool $getTxHex = null,
        ?bool $getTxMetadata = null,
    ): RpcRequest {
        $self = new self();
        $self->getTxKeys = $getTxKeys;
        $self->doNotRelay = $doNotRelay;
        $self->getTxHex = $getTxHex;
        $self->getTxMetadata = $getTxMetadata;
        return new RpcRequest('sweep_dust', $self);
    }
}
