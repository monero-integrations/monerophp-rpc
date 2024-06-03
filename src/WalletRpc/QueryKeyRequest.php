<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use MoneroIntegrations\MoneroRpc\WalletRpc\Model\QueryKeyType;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Return the spend or view private key.
 */
class QueryKeyRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Which key to retrieve: "mnemonic" - the mnemonic seed (older wallets do not have one) OR "view_key" - the view key OR "spend_key".
     */
    #[Json('key_type')]
    public QueryKeyType $keyType;

    public static function create(QueryKeyType $keyType): RpcRequest
    {
        $self = new self();
        $self->keyType = $keyType;
        return new RpcRequest('query_key', $self);
    }
}
