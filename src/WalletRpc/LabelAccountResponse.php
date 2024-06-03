<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Label an account.
 */
class LabelAccountResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
