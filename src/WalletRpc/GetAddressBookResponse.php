<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use MoneroIntegrations\MoneroRpc\WalletRpc\Model\AddressBookEntry;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Retrieves entries from the address book.
 */
class GetAddressBookResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /** @var AddressBookEntry[] */
    #[Json(type: AddressBookEntry::class)]
    public array $entries = [];
}
