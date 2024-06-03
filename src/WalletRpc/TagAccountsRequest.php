<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Apply a filtering tag to a list of accounts.
 */
class TagAccountsRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Tag for the accounts.
     */
    #[Json]
    public string $tag;

    /**
     * @var int[] Tag this list of accounts.
     */
    #[Json]
    public array $accounts;


    /**
     * @param int[] $accounts
     */
    public static function create(string $tag, array $accounts): RpcRequest
    {
        $self = new self();
        $self->tag = $tag;
        $self->accounts = $accounts;
        return new RpcRequest('tag_accounts', $self);
    }
}
