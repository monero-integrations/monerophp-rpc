<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Block header information for the most recent block is easily retrieved with this method. No inputs are needed.
 */
class GetLastBlockHeaderRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Add PoW hash to block_header response.
     * When omitted the default value is false
     */
    #[Json('fill_pow_hash', omit_empty: true)]
    public ?bool $fillPowHash;

    public static function create(?bool $fillPowHash = null): RpcRequest
    {
        $self = new self();
        $self->fillPowHash = $fillPowHash;
        return new RpcRequest('get_last_block_header', $self);
    }
}
