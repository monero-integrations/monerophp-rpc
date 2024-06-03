<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\Exception;

use Exception;

final class AttributeNotFoundException extends Exception implements MoneroRpcException
{
}
