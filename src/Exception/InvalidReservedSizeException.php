<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\Exception;

use Exception;

final class InvalidReservedSizeException extends Exception implements MoneroRpcException
{
}
