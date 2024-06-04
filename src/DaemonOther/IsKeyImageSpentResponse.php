<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonOther;

use MoneroIntegrations\MoneroRpc\DaemonRpc\DaemonRpcAccessResponseFields;
use MoneroIntegrations\MoneroRpc\Enum\SpentStatus;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Check if outputs have been spent using the key image associated with the output.
 */
class IsKeyImageSpentResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
    use DaemonRpcAccessResponseFields;

    /**
     * @var SpentStatus[] List of statuses for each image checked. Statuses are follows: 0 = unspent, 1 = spent in blockchain, 2 = spent in transaction pool
     */
    #[Json('spent_status', type: SpentStatus::class)]
    public array $spentStatus  = [];
}
