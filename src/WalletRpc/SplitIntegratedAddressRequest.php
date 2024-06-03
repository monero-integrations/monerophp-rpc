<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Retrieve the standard address and payment id corresponding to an integrated address.
 */
class SplitIntegratedAddressRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * string
     */
    #[Json('integrated_address')]
    public string $integratedAddress;

    public static function create(string $integratedAddress): RpcRequest
    {
        $self = new self();
        $self->integratedAddress = $integratedAddress;
        return new RpcRequest('split_integrated_address', $self);
    }
}
