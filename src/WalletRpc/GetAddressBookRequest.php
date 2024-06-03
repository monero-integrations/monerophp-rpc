<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Retrieves entries from the address book.
 */
class GetAddressBookRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * @var ?int[] indices of the requested address book entries
     */
    #[Json(omit_empty: true)]
    public ?array $entries;


    /**
     * @param ?int[] $entries
     */
    public static function create(?array $entries = null): RpcRequest
    {
        $self = new self();
        $self->entries = $entries;
        return new RpcRequest('get_address_book', $self);
    }
}
