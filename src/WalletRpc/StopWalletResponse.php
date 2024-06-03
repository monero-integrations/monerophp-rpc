<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Store the current state of any open wallet and exit the monero-wallet-rpc process.
 */
class StopWalletResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
