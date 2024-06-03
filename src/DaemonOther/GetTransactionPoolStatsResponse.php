<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonOther;

use MoneroIntegrations\MoneroRpc\DaemonOther\Model\TxPoolStats;
use MoneroIntegrations\MoneroRpc\DaemonRpc\DaemonRpcAccessResponseFields;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Get the transaction pool statistics.
 */
class GetTransactionPoolStatsResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
    use DaemonRpcAccessResponseFields;

    /**
     * as follows:
     */
    #[Json('pool_stats')]
    public TxPoolStats $poolStats;
}
