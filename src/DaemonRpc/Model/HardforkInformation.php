<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc\Model;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

class HardforkInformation implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    #[Json]
    public int $height;

    #[Json('hf_version')]
    public int $version;
}
