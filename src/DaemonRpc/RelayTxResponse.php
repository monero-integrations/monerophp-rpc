<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Relay a list of transaction IDs.
 */
class RelayTxResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
    use DaemonRpcAccessResponseFields;
}
