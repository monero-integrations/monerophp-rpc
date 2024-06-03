<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonOther;

use MoneroIntegrations\MoneroRpc\DaemonOther\Model\GetTransactionsEntry;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;

/**
 * Look up one or more transactions by hash.
 */
class GetTransactionsResponse
{
    use JsonSerializeBigInt;

    /**
     * @var string[] Transaction hashes that could not be found.
     */
    #[Json('missed_tx', omit_empty: true)]
    public array $missedTx = [];

    /** @var GetTransactionsEntry[] */
    #[Json(type: GetTransactionsEntry::class)]
    public array $txs;
}
