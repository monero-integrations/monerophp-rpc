<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Get attribute value by name.
 */
class GetAttributeResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * attribute value
     */
    #[Json]
    public string $value;
}
