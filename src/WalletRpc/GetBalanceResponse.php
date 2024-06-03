<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use MoneroIntegrations\MoneroRpc\WalletRpc\Model\SubAddressInformation;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Return the wallet's balance.Alias: *getbalance*.
 */
class GetBalanceResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * The total balance of the current monero-wallet-rpc in session.
     */
    #[Json]
    public int $balance;

    /**
     * Number of blocks before balance is safe to spend.
     */
    #[Json('blocks_to_unlock')]
    public int $blocksToUnlock;

    /**
     * True if importing multisig data is needed for returning a correct balance.
     */
    #[Json('multisig_import_needed')]
    public bool $multisigImportNeeded;

    /** @var SubAddressInformation[] */
    #[Json('per_subaddress', type: SubAddressInformation::class)]
    public array $perSubaddress = [];

    /**
     * Time (in seconds) before balance is safe to spend.
     */
    #[Json('time_to_unlock')]
    public int $timeToUnlock;

    /**
     * Unlocked funds are those funds that are sufficiently deep enough in the Monero blockchain to be considered safe to spend.
     */
    #[Json('unlocked_balance')]
    public int $unlockedBalance;
}
