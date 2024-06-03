<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Delete an entry from the address book.
 */
class DeleteAddressBookResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
