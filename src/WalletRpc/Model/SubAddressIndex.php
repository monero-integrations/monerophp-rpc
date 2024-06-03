<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc\Model;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

class SubAddressIndex implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Account index.
     */
    #[Json]
    public int $major;

    /**
     * Address index.
     */
    #[Json]
    public int $minor;

    public function __construct(int $major, int $minor)
    {
        $this->major = $major;
        $this->minor = $minor;
    }
}
