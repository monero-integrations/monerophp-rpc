<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc;

use MoneroIntegrations\MoneroRpc\Model\BlockHash;
use MoneroIntegrations\MoneroRpc\Model\BlockHeight;
use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Full block information can be retrieved by either block height or hash, like with the above block header calls. For full block information, both lookups use the same method, but with different input parameters.
 */
class GetBlockRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * The block's height.
     */
    #[Json(omit_empty: true)]
    public ?int $height;

    /**
     * The block's hash.
     */
    #[Json(omit_empty: true)]
    public ?string $hash;

    /**
     * Add PoW hash to block_header response.
     * When omitted the default value is false
     */
    #[Json('fill_pow_hash', omit_empty: true)]
    public ?bool $fillPowHash;

    public static function create(BlockHash|BlockHeight $blockHashOrHeight, ?bool $fillPowHash = null): RpcRequest
    {
        $self = new self();
        if ($blockHashOrHeight instanceof BlockHeight) {
            $self->height = $blockHashOrHeight->value;
        } else {
            $self->hash = $blockHashOrHeight->value;
        }

        $self->fillPowHash = $fillPowHash;
        return new RpcRequest('get_block', $self);
    }
}
