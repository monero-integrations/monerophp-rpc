<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Close the currently opened wallet, after trying to save it.
 */
class CloseWalletResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
