<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Generate a signature to prove of an available amount in a wallet.
 */
class GetReserveProofResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * reserve signature.
     */
    #[Json]
    public string $signature;
}
