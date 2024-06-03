<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Save the wallet file.
 */
class StoreResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
