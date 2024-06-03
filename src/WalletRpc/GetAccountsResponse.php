<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use MoneroIntegrations\MoneroRpc\WalletRpc\Model\SubAddressAccountInformation;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Get all accounts for a wallet. Optionally filter accounts by tag.
 */
class GetAccountsResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * @var SubAddressAccountInformation[] subaddress account information:
     */
    #[Json('subaddress_accounts', SubAddressAccountInformation::class)]
    public array $subaddressAccounts = [];

    /**
     * Total balance of the selected accounts (locked or unlocked).
     */
    #[Json('total_balance')]
    public int $totalBalance;

    /**
     * Total unlocked balance of the selected accounts.
     */
    #[Json('total_unlocked_balance')]
    public int $totalUnlockedBalance;
}
