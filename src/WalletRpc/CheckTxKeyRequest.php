<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Model\Address;
use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Check a transaction in the blockchain with its secret key.
 */
class CheckTxKeyRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * transaction id.
     */
    #[Json]
    public string $txid;

    /**
     * transaction secret key.
     */
    #[Json('tx_key')]
    public string $txKey;

    /**
     * destination public address of the transaction.
     */
    #[Json]
    public Address $address;

    public static function create(string $txid, string $txKey, Address $address): RpcRequest
    {
        $self = new self();
        $self->txid = $txid;
        $self->txKey = $txKey;
        $self->address = $address;
        return new RpcRequest('check_tx_key', $self);
    }
}
