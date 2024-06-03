<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Get transaction secret key from transaction id.
 */
class GetTxKeyResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Amount of the transaction.
     */
    #[Json]
    public int $received;

    /**
     * States if the transaction is still in pool or has been added to a block.
     */
    #[Json('in_pool')]
    public bool $inPool;

    /**
     * transaction secret key.
     */
    #[Json('tx_key')]
    public string $txKey;
}
