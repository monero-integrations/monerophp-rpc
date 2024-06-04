<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Stop mining in the Monero daemon.
 */
class StopMiningResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
