<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Sign a string.
 */
class SignRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Anything you need to sign.
     */
    #[Json]
    public string $data;

    public static function create(string $data): RpcRequest
    {
        $self = new self();
        $self->data = $data;
        return new RpcRequest('sign', $self);
    }
}
