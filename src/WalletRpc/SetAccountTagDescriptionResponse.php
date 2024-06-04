<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Set description for an account tag.
 */
class SetAccountTagDescriptionResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
