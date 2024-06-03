<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Make an integrated address from the wallet address and a payment id.
 */
class MakeIntegratedAddressRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Destination public address.
     * When omitted the default value is primary address
     */
    #[Json('standard_address', omit_empty: true)]
    public ?string $standardAddress;

    /**
     * 16 characters hex encoded.
     * When omitted the default value is a random ID
     */
    #[Json('payment_id', omit_empty: true)]
    public ?string $paymentId;

    public static function create(?string $standardAddress = null, ?string $paymentId = null): RpcRequest
    {
        $self = new self();
        $self->standardAddress = $standardAddress;
        $self->paymentId = $paymentId;
        return new RpcRequest('make_integrated_address', $self);
    }
}
