<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Model\Address;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Make a wallet multisig by importing peers multisig string.
 */
class MakeMultisigResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * multisig wallet address.
     */
    #[Json]
    public Address $address;

    /**
     * Multisig string to share with peers to create the multisig wallet (extra step for N-1/N wallets).
     */
    #[Json('multisig_info')]
    public string $multisigInfo;
}
