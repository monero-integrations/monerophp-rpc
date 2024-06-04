<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\Request;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;

class RpcRequest
{
    use JsonSerializeBigInt;

    #[Json]
    private readonly string $jsonrpc;

    #[Json]
    private readonly string $id;

    #[Json]
    private readonly string $method;

    #[Json('params', omit_empty: true)]
    public ?ParameterInterface $parameters;

    public function __construct(string $method, ParameterInterface $parameters = null)
    {
        $this->method = $method;
        $this->jsonrpc = '2.0';
        $this->id = '0';

        $this->parameters = $parameters;
    }
}
