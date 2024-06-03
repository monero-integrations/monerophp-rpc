<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Checks whether a given output is currently frozen by key image
 */
class FrozenRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    #[Json('key_image')]
    public string $keyImage;

    public static function create(string $keyImage): RpcRequest
    {
        $self = new self();
        $self->keyImage = $keyImage;
        return new RpcRequest('frozen', $self);
    }
}
