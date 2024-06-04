<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Refresh a wallet after openning.
 */
class RefreshRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * The block height from which to start refreshing. Passing no value or a value less than the last block scanned by the wallet refreshes from the last block scanned.
     */
    #[Json('start_height', omit_empty: true)]
    public ?int $startHeight;

    public static function create(?int $startHeight = null): RpcRequest
    {
        $self = new self();
        $self->startHeight = $startHeight;
        return new RpcRequest('refresh', $self);
    }
}
