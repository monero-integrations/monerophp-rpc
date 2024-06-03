<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\Exception;

use Exception;

final class TagNotFoundException extends Exception implements MoneroRpcException
{
}
