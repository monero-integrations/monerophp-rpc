<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc\Model;

use MoneroIntegrations\MoneroRpc\Model\Address;
use MoneroIntegrations\MoneroRpc\Model\Amount;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

class Destination implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Amount to send to each destination, in piconero.
     */
    #[Json]
    public Amount $amount;

    /**
     * The public address of the recipient.
     */
    #[Json]
    public Address $address;

    public function __construct(Address|string $address, Amount $amount)
    {
        if (is_string($address)) {
            $address = new Address($address);
        }
        $this->address = $address;
        $this->amount = $amount;
    }
}
