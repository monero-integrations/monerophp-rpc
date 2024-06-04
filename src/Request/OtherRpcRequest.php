<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\Request;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

class OtherRpcRequest implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
