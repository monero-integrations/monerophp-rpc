<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Label an address.
 */
class LabelAddressResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
