<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonOther\Model;

use MoneroIntegrations\MoneroRpc\Model\BlockHeight;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

class Input implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    #[Json(['gen', 'height'])]
    public BlockHeight $gen;

    #[Json]
    public InputKey $key;
}
