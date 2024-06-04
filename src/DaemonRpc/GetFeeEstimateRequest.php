<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Gives an estimation on fees per byte.
 */
class GetFeeEstimateRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Optional
     */
    #[Json('grace_blocks', omit_empty: true)]
    public ?int $graceBlocks;

    public static function create(?int $graceBlocks = null): RpcRequest
    {
        $self = new self();
        $self->graceBlocks = $graceBlocks;
        return new RpcRequest('get_fee_estimate', $self);
    }
}
