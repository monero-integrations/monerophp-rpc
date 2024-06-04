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
 * Proves a wallet has a disposable reserve using a signature.
 */
class CheckReserveProofRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Public address of the wallet.
     */
    #[Json]
    public Address $address;

    /**
     * If a _message_ was added to `get_reserve_proof` , this message will be required when using `check_reserve_proof`
     */
    #[Json(omit_empty: true)]
    public ?string $message;

    /**
     * reserve signature to confirm.
     */
    #[Json]
    public string $signature;

    public static function create(Address $address, string $signature, ?string $message = null): RpcRequest
    {
        $self = new self();
        $self->address = $address;
        $self->message = $message;
        $self->signature = $signature;
        return new RpcRequest('check_reserve_proof', $self);
    }
}
