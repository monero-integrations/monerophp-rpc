<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

class EstimateTxSizeAndWeightResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    #[Json]
    public int $size;

    #[Json]
    public int $weight;
}
