<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc\Model;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

class AddressBookEntry implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Public address of the entry
     */
    #[Json]
    public string $address;

    /**
     * Description of this address entry
     */
    #[Json]
    public string $description;

    #[Json]
    public int $index;

    public function __construct(string $address, string $description, int $index)
    {
        $this->address = $address;
        $this->description = $description;
        $this->index = $index;
    }
}
