<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc\Model;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

class AuxPow implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    #[Json]
    public string $id;

    #[Json]
    public string $hash;

    public function __construct(string $id, string $hash)
    {
        $this->id = $id;
        $this->hash = $hash;
    }
}
