<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonOther\Model;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

class GetOutputsOut implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    #[Json]
    public int $amount;

    #[Json]
    public int $index;

    public function __construct(int $amount, int $index)
    {
        $this->amount = $amount;
        $this->index = $index;
    }
}
