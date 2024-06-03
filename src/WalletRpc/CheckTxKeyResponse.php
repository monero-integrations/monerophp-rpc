<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Check a transaction in the blockchain with its secret key.
 */
class CheckTxKeyResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Number of block mined after the one with the transaction.
     */
    #[Json]
    public int $confirmations;

    /**
     * States if the transaction is still in pool or has been added to a block.
     */
    #[Json('in_pool')]
    public bool $inPool;

    /**
     * Amount of the transaction.
     */
    #[Json]
    public int $received;
}
