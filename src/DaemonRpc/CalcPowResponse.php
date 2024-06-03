<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc;

use MoneroIntegrations\MoneroRpc\Trait\StringResultTrait;
use Square\Pjson\JsonDataSerializable;

/**
 * Calculate PoW hash for a block candidate.
 */
class CalcPowResponse implements JsonDataSerializable
{
    use StringResultTrait;
}
