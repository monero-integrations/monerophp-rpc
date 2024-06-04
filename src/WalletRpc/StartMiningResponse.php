<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Start mining in the Monero daemon.
 */
class StartMiningResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
