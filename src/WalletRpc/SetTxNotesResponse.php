<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Set arbitrary string notes for transactions.
 */
class SetTxNotesResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
