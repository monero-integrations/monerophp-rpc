<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Get attribute value by name.
 */
class GetAttributeRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * attribute name
     */
    #[Json]
    public string $key;

    public static function create(string $key): RpcRequest
    {
        $self = new self();
        $self->key = $key;
        return new RpcRequest('get_attribute', $self);
    }
}
