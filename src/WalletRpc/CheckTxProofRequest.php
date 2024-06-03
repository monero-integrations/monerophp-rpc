<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Model\Address;
use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Prove a transaction by checking its signature.
 */
class CheckTxProofRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * transaction id.
     */
    #[Json]
    public string $txid;

    /**
     * destination public address of the transaction.
     */
    #[Json]
    public Address $address;

    /**
     * transaction signature to confirm.
     */
    #[Json]
    public string $signature;

    /**
     * Should be the same message used in `get_tx_proof`.
     */
    #[Json(omit_empty: true)]
    public ?string $message;

    public static function create(
        string $txid,
        Address $address,
        string $signature,
        ?string $message = null,
    ): RpcRequest {
        $self = new self();
        $self->txid = $txid;
        $self->address = $address;
        $self->signature = $signature;
        $self->message = $message;
        return new RpcRequest('check_tx_proof', $self);
    }
}
