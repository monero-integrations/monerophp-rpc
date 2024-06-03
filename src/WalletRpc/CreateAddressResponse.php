<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Model\Address;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Create a new address for an account. Optionally, label the new address.
 */
class CreateAddressResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Newly created address. Base58 representation of the public keys.
     */
    #[Json]
    public Address $address;

    /**
     * Index of the new address under the input account.
     */
    #[Json('address_index')]
    public int $addressIndex;

    /**
     * @var int[] List of address indices.
     */
    #[Json('address_indices')]
    public array $addressIndices = [];

    /**
     * list of addresses.
     * @var Address[]
     */
    #[Json(type: Address::class)]
    public array $addresses = [];
}
