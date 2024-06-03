<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Model\Amount;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use MoneroIntegrations\MoneroRpc\WalletRpc\Model\KeyImageList;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Send monero to a number of recipients.
 */
class TransferResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Amount transferred for the transaction.
     */
    #[Json]
    public Amount $amount;

    /**
     * Key images of spent outputs.
     */
    #[Json('spent_key_images')]
    public KeyImageList $spentKeyImages;

    /**
     * The amount of fees paid
     */
    #[Json]
    public int $fee;

    /**
     * Set of multisig transactions in the process of being signed (empty for non-multisig).
     */
    #[Json('multisig_txset')]
    public string $multisigTxset;

    /**
     * Raw transaction represented as hex string, if get_tx_hex is true.
     */
    #[Json('tx_blob')]
    public string $txBlob;

    /**
     * String for the publicly searchable transaction hash.
     */
    #[Json('tx_hash')]
    public string $txHash;

    /**
     * String for the transaction key if get_tx_key is true, otherwise, blank string.
     */
    #[Json('tx_key')]
    public string $txKey;

    /**
     * Set of transaction metadata needed to relay this transfer later, if get_tx_metadata is true.
     */
    #[Json('tx_metadata')]
    public string $txMetadata;

    /**
     * Set of unsigned tx for cold-signing purposes.
     */
    #[Json('unsigned_txset')]
    public string $unsignedTxset;

    /**
     * Metric used to calculate transaction fee.
     */
    #[Json]
    public int $weight;
}
