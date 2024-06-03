<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

class GetOutputDistributionRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * @var int[] amounts to look for
     */
    #[Json]
    public array $amounts;

    /**
     * (optional, default is `false`) States if the result should be cumulative (`true`) or not (`false`)
     */
    #[Json(omit_empty: true)]
    public ?bool $cumulative;

    /**
     * starting height to check from
     * When omitted the default value is 0
     */
    #[Json('from_height', omit_empty: true)]
    public ?int $fromHeight;

    /**
     * ending height to check up to
     * When omitted the default value is 0
     */
    #[Json('to_height', omit_empty: true)]
    public ?int $toHeight;

    /**
     * @param int[] $amounts
     */
    public static function create(
        array $amounts,
        ?bool $cumulative = null,
        ?int $fromHeight = null,
        ?int $toHeight = null,
    ): RpcRequest {
        $self = new self();
        $self->amounts = $amounts;
        $self->cumulative = $cumulative;
        $self->fromHeight = $fromHeight;
        $self->toHeight = $toHeight;
        return new RpcRequest('get_output_distribution', $self);
    }
}
