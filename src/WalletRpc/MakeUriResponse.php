<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Create a payment URI using the official URI spec.
 */
class MakeUriResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * This contains all the payment input information as a properly formatted payment URI
     */
    #[Json]
    public string $uri;
}
