<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Apply a filtering tag to a list of accounts.
 */
class TagAccountsResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
