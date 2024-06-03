<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Get string notes for transactions.
 */
class GetTxNotesResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * @var string[] notes for the transactions
     */
    #[Json]
    public array $notes = [];
}
