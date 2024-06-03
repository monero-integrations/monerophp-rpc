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
 * Add an entry to the address book.
 */
class AddAddressBookRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    #[Json]
    public Address $address;

    /**
     * (Optional) defaults to "";
     */
    #[Json(omit_empty: true)]
    public ?string $description;

    public static function create(Address $address, ?string $description = null): RpcRequest
    {
        $self = new self();
        $self->address = $address;
        $self->description = $description;
        return new RpcRequest('add_address_book', $self);
    }
}
