<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc;

use MoneroIntegrations\MoneroRpc\Model\BlockHash;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Generate a block and specify the address to receive the coinbase reward.
 */
class GenerateblocksResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;

    /**
     * @var BlockHash[]
     */
    #[Json(type: BlockHash::class)]
    public array $blocks = [];

    #[Json]
    public int $height;
}
