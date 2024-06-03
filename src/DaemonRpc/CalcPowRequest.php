<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Calculate PoW hash for a block candidate.
 */
class CalcPowRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * The major version of the monero protocol at this block height.
     */
    #[Json('major_version')]
    public int $majorVersion;

    #[Json]
    public int $height;

    #[Json('block_blob')]
    public string $blockBlob;

    #[Json('seed_hash')]
    public string $seedHash;

    public static function create(int $majorVersion, int $height, string $blockBlob, string $seedHash): RpcRequest
    {
        $self = new self();
        $self->majorVersion = $majorVersion;
        $self->height = $height;
        $self->blockBlob = $blockBlob;
        $self->seedHash = $seedHash;
        return new RpcRequest('calc_pow', $self);
    }
}
