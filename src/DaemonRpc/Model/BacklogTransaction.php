<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc\Model;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

class BacklogTransaction implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    #[Json]
    public string $id;

    #[Json]
    public int $weight;

    #[Json]
    public int $fee;

    public function __construct(string $id, int $weight, int $fee)
    {
        $this->id = $id;
        $this->weight = $weight;
        $this->fee = $fee;
    }
}
