<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Check if an IP address is banned and for how long.
 */
class BannedRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    #[Json]
    public string $address;

    public static function create(string $address): RpcRequest
    {
        $self = new self();
        $self->address = $address;
        return new RpcRequest('banned', $self);
    }
}
