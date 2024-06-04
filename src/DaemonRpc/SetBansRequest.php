<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc;

use MoneroIntegrations\MoneroRpc\DaemonRpc\Model\Node;
use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Ban another node by IP.
 */
class SetBansRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /** @var Node[] */
    #[Json]
    public array $bans;

    /**
     * @param Node[] $bans
     */
    public static function create(array $bans): RpcRequest
    {
        $self = new self();
        $self->bans = $bans;
        return new RpcRequest('set_bans', $self);
    }
}
