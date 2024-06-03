<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonOther;

use MoneroIntegrations\MoneroRpc\DaemonOther\Model\MemPoolTransaction;
use MoneroIntegrations\MoneroRpc\DaemonOther\Model\SpentOutputKeyImages;
use MoneroIntegrations\MoneroRpc\DaemonRpc\DaemonRpcAccessResponseFields;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Show information about valid transactions seen by the node but not yet mined into a block, as well as spent key image information for the txpool in the node's memory.
 */
class GetTransactionPoolResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
    use DaemonRpcAccessResponseFields;

    /** @var SpentOutputKeyImages[] */
    #[Json('spent_key_images', type: SpentOutputKeyImages::class)]
    public array $spentKeyImages;

    /** @var MemPoolTransaction[] */
    #[Json(type: MemPoolTransaction::class)]
    public array $transactions;
}
