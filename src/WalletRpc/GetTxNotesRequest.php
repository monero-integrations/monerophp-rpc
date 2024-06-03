<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Get string notes for transactions.
 */
class GetTxNotesRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * @var string[] transaction ids
     */
    #[Json]
    public array $txids;


    /**
     * @param string[] $txids
     */
    public static function create(array $txids): RpcRequest
    {
        $self = new self();
        $self->txids = $txids;
        return new RpcRequest('get_tx_notes', $self);
    }
}
