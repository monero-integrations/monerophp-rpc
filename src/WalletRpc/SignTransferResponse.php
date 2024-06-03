<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Sign a transaction created on a read-only wallet (in cold-signing process)
 */
class SignTransferResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Set of signed tx to be used for submitting transfer.
     */
    #[Json('signed_txset')]
    public string $signedTxset;

    /**
     * @var string[] The tx hashes of every transaction.
     */
    #[Json('tx_hash_list')]
    public array $txHashList = [];

    /**
     * @var string[] The tx raw data of every transaction.
     */
    #[Json('tx_raw_list')]
    public array $txRawList = [];

    /**
     * @var string[]
     */
    #[Json('tx_key_list')]
    public array $txKeyList = [];
}
