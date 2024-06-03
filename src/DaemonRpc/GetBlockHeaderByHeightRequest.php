<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Similar to [get_block_header_by_hash](#get_block_header_by_hash) above, this method includes a block's height as an input parameter to retrieve basic information about the block.
 */
class GetBlockHeaderByHeightRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * The block's height.
     */
    #[Json]
    public int $height;

    /**
     * Add PoW hash to block_header response.
     * When omitted the default value is false
     */
    #[Json('fill_pow_hash', omit_empty: true)]
    public ?bool $fillPowHash;

    public static function create(int $height, ?bool $fillPowHash = null): RpcRequest
    {
        $self = new self();
        $self->height = $height;
        $self->fillPowHash = $fillPowHash;
        return new RpcRequest('get_block_header_by_height', $self);
    }
}
