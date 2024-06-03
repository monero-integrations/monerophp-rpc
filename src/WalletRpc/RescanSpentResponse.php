<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Rescan the blockchain for spent outputs.
 */
class RescanSpentResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
