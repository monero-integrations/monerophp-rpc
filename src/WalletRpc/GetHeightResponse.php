<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Returns the wallet's current block height.
 */
class GetHeightResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * The current monero-wallet-rpc's blockchain height. If the wallet has been offline for a long time, it may need to catch up with the daemon.
     */
    #[Json]
    public int $height;
}
