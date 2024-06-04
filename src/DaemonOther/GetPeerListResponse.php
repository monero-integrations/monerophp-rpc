<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonOther;

use MoneroIntegrations\MoneroRpc\DaemonOther\Model\Peer;
use MoneroIntegrations\MoneroRpc\DaemonRpc\DaemonStandardResponseFields;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Get the known peers list.
 */
class GetPeerListResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;

    /** @var Peer[] Offline peers */
    #[Json('gray_list', type: Peer::class)]
    public array $grayList = [];

    /** @var Peer[] Online peers. */
    #[Json('white_list', type: Peer::class)]
    public array $whiteList = [];
}
