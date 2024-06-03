<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Generate a signature to prove a spend. Unlike proving a transaction, it does not requires the destination public address.
 */
class GetSpendProofResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * spend signature.
     */
    #[Json]
    public string $signature;
}
