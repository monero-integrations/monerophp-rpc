<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Edit an existing address book entry.Alias: *None*
 */
class EditAddressBookResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
