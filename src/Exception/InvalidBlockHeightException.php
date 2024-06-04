<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\Exception;

use Exception;

final class InvalidBlockHeightException extends Exception implements MoneroRpcException
{
}
