<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Sign a string.
 */
class SignResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Signature generated against the "data" and the account public address.
     */
    #[Json]
    public string $signature;
}
