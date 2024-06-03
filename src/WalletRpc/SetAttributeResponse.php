<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Set arbitrary attribute.
 */
class SetAttributeResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
