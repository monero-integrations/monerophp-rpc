<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Submit a previously signed transaction on a read-only wallet (in cold-signing process).
 */
class SubmitTransferResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * @var string[] The tx hashes of every transaction.
     */
    #[Json('tx_hash_list')]
    public array $txHashList = [];
}
