<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonOther;

use MoneroIntegrations\MoneroRpc\DaemonRpc\DaemonRpcAccessResponseFields;
use MoneroIntegrations\MoneroRpc\Model\BlockHash;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Get the known blocks hashes which are not on the main chain.
 */
class GetAltBlocksHashesResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
    use DaemonRpcAccessResponseFields;

    /**
     * @var BlockHash[] list of alternative blocks hashes to main chain
     */
    #[Json('blks_hashes', type: BlockHash::class)]
    public array $blockHashes = [];
}
