<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc;

use MoneroIntegrations\MoneroRpc\DaemonRpc\Model\BlockHeader;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Similar to [get_block_header_by_height](#get_block_header_by_height) above, but for a range of blocks. This method includes a starting block height and an ending block height as parameters to retrieve basic information about the range of blocks.
 */
class GetBlockHeadersRangeResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
    use DaemonRpcAccessResponseFields;

    /** @var BlockHeader[] (a structure containing block header information. See [get_last_block_header](#get_last_block_header)). */
    #[Json(type: BlockHeader::class)]
    public array $headers = [];
}
