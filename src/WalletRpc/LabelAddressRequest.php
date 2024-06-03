<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use MoneroIntegrations\MoneroRpc\WalletRpc\Model\SubAddressIndex;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Label an address.
 */
class LabelAddressRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * JSON Object containing the major & minor address index:
     */
    #[Json]
    public SubAddressIndex $index;

    /**
     * Label for the address.
     */
    #[Json]
    public string $label;

    public static function create(SubAddressIndex $index, string $label): RpcRequest
    {
        $self = new self();
        $self->index = $index;
        $self->label = $label;
        return new RpcRequest('label_address', $self);
    }
}
