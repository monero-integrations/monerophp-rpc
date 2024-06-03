<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Model\Address;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Performs extra multisig keys exchange rounds. Needed for arbitrary M/N multisig wallets
 */
class ExchangeMultisigKeysResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    #[Json]
    public Address $address;

    #[Json('multisig_info')]
    public string $multisigInfo;
}
