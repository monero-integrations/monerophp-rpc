<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Rescan the blockchain from scratch, losing any information which can not be recovered from the blockchain itself.This includes destination addresses, tx secret keys, tx notes, etc.
 */
class RescanBlockchainResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
