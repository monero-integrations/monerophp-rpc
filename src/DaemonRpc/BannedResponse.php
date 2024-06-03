<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc;

use MoneroIntegrations\MoneroRpc\Enum\ResponseStatus;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Check if an IP address is banned and for how long.
 */
class BannedResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    #[Json]
    public bool $banned;

    #[Json]
    public int $seconds;

    /**
     * General RPC error code. "OK" means everything looks good.
     */
    #[Json]
    public ResponseStatus $status;
}
