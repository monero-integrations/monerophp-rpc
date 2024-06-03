<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonOther;

use MoneroIntegrations\MoneroRpc\DaemonRpc\DaemonStandardResponseFields;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

class GetNetStatsResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;

    /**
     * Unix start time.
     */
    #[Json('start_time')]
    public int $startTime;

    #[Json('total_packets_in')]
    public int $totalPacketsIn;

    #[Json('total_bytes_in')]
    public int $totalBytesIn;

    #[Json('total_packets_out')]
    public int $totalPacketsOut;

    #[Json('total_bytes_out')]
    public int $totalBytesOut;
}
