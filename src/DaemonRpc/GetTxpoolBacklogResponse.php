<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc;

use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Get all transaction pool backlog
 */
class GetTxpoolBacklogResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;

    /**
     * array of structures tx_backlog_entry (in binary form)
     */
    #[Json]
    public string $backlog;
}
