<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use MoneroIntegrations\MoneroRpc\WalletRpc\Model\AccountTagInformation;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Get a list of user-defined account tags.
 */
class GetAccountTagsResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /** @var AccountTagInformation[] */
    #[Json('account_tags', type:AccountTagInformation::class)]
    public array $accountTags = [];
}
