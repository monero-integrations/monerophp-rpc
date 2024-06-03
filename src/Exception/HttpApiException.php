<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\Exception;

use RuntimeException;

final class HttpApiException extends RuntimeException implements MoneroRpcException
{
}
