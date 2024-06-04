<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc;

use MoneroIntegrations\MoneroRpc\DaemonRpc\Model\ConnectionInfo;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Retrieve information about incoming and outgoing connections to your node.
 */
class GetConnectionsResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;

    /** @var ConnectionInfo[] */
    #[Json(type: ConnectionInfo::class)]
    public array $connections = [];
}
