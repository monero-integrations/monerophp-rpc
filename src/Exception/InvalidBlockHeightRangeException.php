<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\Exception;

use Exception;

final class InvalidBlockHeightRangeException extends Exception implements MoneroRpcException
{
}
