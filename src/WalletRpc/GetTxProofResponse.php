<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Get transaction signature to prove it.
 */
class GetTxProofResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * transaction signature.
     */
    #[Json]
    public string $signature;
}
