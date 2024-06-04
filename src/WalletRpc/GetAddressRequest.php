<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Return the wallet's addresses for an account. Optionally filter for specific set of subaddresses.
 */
class GetAddressRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Return subaddresses for this account.
     */
    #[Json('account_index')]
    public int $accountIndex;

    /**
     * @var ?int[] List of subaddresses to return from an account.
     */
    #[Json('address_index', omit_empty: true)]
    public ?array $addressIndex;

    /**
     * @param ?int[] $addressIndex
     */
    public static function create(int $accountIndex, ?array $addressIndex = null): RpcRequest
    {
        $self = new self();
        $self->accountIndex = $accountIndex;
        $self->addressIndex = $addressIndex;
        return new RpcRequest('get_address', $self);
    }
}
