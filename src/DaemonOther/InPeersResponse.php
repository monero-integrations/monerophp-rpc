<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonOther;

use MoneroIntegrations\MoneroRpc\DaemonRpc\DaemonStandardResponseFields;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Limit number of Incoming peers.
 */
class InPeersResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;

    /**
     * Max number of incoming peers
     */
    #[Json('in_peers')]
    public int $inPeers;
}
