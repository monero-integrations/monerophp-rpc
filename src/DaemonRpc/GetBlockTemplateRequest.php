<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Get a block template on which mining a new block.
 */
class GetBlockTemplateRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Address of wallet to receive coinbase transactions if block is successfully mined.
     */
    #[Json('wallet_address')]
    public string $walletAddress;

    /**
     * Reserve size.
     */
    #[Json('reserve_size')]
    public int $reserveSize;

    public static function create(string $walletAddress, int $reserveSize): RpcRequest
    {
        $self = new self();
        $self->walletAddress = $walletAddress;
        $self->reserveSize = $reserveSize;
        return new RpcRequest('get_block_template', $self);
    }
}
