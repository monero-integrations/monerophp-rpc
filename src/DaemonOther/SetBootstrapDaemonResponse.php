<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonOther;

use MoneroIntegrations\MoneroRpc\Enum\ResponseStatus;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Give immediate usability to wallets while syncing by proxying RPC requests.
 */
class SetBootstrapDaemonResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * General RPC error code. "OK" means everything looks good.
     */
    #[Json]
    public ResponseStatus $status;
}
