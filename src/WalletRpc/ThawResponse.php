<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Thaw a single output by key image so it may be used again
 */
class ThawResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
