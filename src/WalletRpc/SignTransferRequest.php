<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Sign a transaction created on a read-only wallet (in cold-signing process)
 */
class SignTransferRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * string. Set of unsigned tx returned by "transfer" or "transfer_split" methods.
     */
    #[Json('unsigned_txset')]
    public string $unsignedTxset;

    /**
     * If true, return the raw transaction data. (
     * When omitted the default value is false
     */
    #[Json('export_raw', omit_empty: true)]
    public ?bool $exportRaw;

    /**
     * Return the transaction keys after signing.
     */
    #[Json('get_tx_keys', omit_empty: true)]
    public ?bool $getTxKeys;

    public static function create(string $unsignedTxset, ?bool $exportRaw = null, ?bool $getTxKeys = null): RpcRequest
    {
        $self = new self();
        $self->unsignedTxset = $unsignedTxset;
        $self->exportRaw = $exportRaw;
        $self->getTxKeys = $getTxKeys;
        return new RpcRequest('sign_transfer', $self);
    }
}
