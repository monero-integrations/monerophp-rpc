<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc;

use MoneroIntegrations\MoneroRpc\Trait\StringResultTrait;
use Square\Pjson\JsonDataSerializable;

/**
 * Look up a block's hash by its height.
 */
class OnGetBlockHashResponse implements JsonDataSerializable
{
    use StringResultTrait;
}
