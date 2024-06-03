<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Refresh a wallet after openning.
 */
class RefreshResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Number of new blocks scanned.
     */
    #[Json('blocks_fetched')]
    public int $blocksFetched;

    /**
     * States if transactions to the wallet have been found in the blocks.
     */
    #[Json('received_money')]
    public bool $receivedMoney;
}
