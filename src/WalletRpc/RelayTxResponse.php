<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Relay a transaction previously created with `"do_not_relay":true`.
 */
class RelayTxResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * String for the publically searchable transaction hash.
     */
    #[Json('tx_hash')]
    public string $txHash;
}
