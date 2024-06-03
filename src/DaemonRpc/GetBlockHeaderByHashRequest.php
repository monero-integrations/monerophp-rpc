<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc;

use MoneroIntegrations\MoneroRpc\Model\BlockHash;
use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Block header information can be retrieved using either a block's hash or height. This method includes a block's hash as an input parameter to retrieve basic information about the block.
 */
class GetBlockHeaderByHashRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * The block's sha256 hash.
     */
    #[Json]
    public BlockHash $hash;

    /**
     * Add PoW hash to block_header response.
     * When omitted the default value is false
     */
    #[Json('fill_pow_hash', omit_empty: true)]
    public ?bool $fillPowHash;

    public static function create(BlockHash|string $hash, ?bool $fillPowHash = null): RpcRequest
    {
        if (is_string($hash)) {
            $hash = new BlockHash($hash);
        }
        $self = new self();
        $self->hash = $hash;
        $self->fillPowHash = $fillPowHash;
        return new RpcRequest('get_block_header_by_hash', $self);
    }
}
