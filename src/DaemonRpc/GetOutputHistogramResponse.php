<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc;

use MoneroIntegrations\MoneroRpc\DaemonRpc\Model\Histogram;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Get a histogram of output amounts. For all amounts (possibly filtered by parameters), gives the number of outputs on the chain for that amount.RingCT outputs counts as 0 amount.
 */
class GetOutputHistogramResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
    use DaemonRpcAccessResponseFields;

    /** @var Histogram[] */
    #[Json(type: Histogram::class)]
    public array $histogram = [];
}
