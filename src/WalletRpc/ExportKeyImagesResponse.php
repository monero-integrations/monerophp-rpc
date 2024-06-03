<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use MoneroIntegrations\MoneroRpc\WalletRpc\Model\SignedKeyImage;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Export a signed set of key images.
 */
class ExportKeyImagesResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    #[Json]
    public int $offset;

    /** @var SignedKeyImage[] */
    #[Json('signed_key_images', type: SignedKeyImage::class)]
    public array $signedKeyImages = [];
}
