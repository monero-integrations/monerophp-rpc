<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc\Model;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

class Distribution implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * unsigned int
     */
    #[Json]
    public int $amount;

    #[Json]
    public bool $binary;

    /**
     * unsigned int
     */
    #[Json]
    public int $base;

    #[Json]
    public string $distribution;

    /**
     * unsigned int
     */
    #[Json('start_height')]
    public int $startHeight;

    public function __construct(int $amount, int $base, string $distribution, int $startHeight)
    {
        $this->amount = $amount;
        $this->base = $base;
        $this->distribution = $distribution;
        $this->startHeight = $startHeight;
    }
}
