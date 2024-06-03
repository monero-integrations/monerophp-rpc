<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonOther;

use MoneroIntegrations\MoneroRpc\DaemonRpc\DaemonStandardResponseFields;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Set the daemon log categories.Categories are represented as a comma separated list of `<Category>:<level>`
 */
class SetLogCategoriesResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;

    /**
     * daemon log enabled categories
     */
    #[Json]
    public string $categories;
}
