<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use MoneroIntegrations\MoneroRpc\WalletRpc\Model\PaymentUri;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Parse a payment URI to get payment information.
 */
class ParseUriResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * JSON object containing payment information:
     */
    #[Json]
    public PaymentUri $uri;
}
