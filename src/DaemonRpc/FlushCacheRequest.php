<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Flush bad transactions / blocks from the cache.
 */
class FlushCacheRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * When omitted the default value is false
     */
    #[Json('bad_txs', omit_empty: true)]
    public ?bool $badTxs;

    /**
     * When omitted the default value is false
     */
    #[Json('bad_blocks', omit_empty: true)]
    public ?bool $badBlocks;

    public static function create(?bool $badTxs = null, ?bool $badBlocks = null): RpcRequest
    {
        $self = new self();
        $self->badTxs = $badTxs;
        $self->badBlocks = $badBlocks;
        return new RpcRequest('flush_cache', $self);
    }
}
