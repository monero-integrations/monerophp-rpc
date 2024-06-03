<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\Tests\integration;

use Http\Discovery\Psr18ClientDiscovery;
use PHPUnit\Framework\TestCase;
use MoneroIntegrations\MoneroRpc\DaemonRpcClient;
use MoneroIntegrations\MoneroRpc\Enum\ResponseStatus;

final class DaemonOtherTest extends TestCase
{
    private static DaemonRpcClient $rpcClient;

    public static function setUpBeforeClass(): void
    {
        $httpClient = Psr18ClientDiscovery::find();
        self::$rpcClient = new DaemonRpcClient($httpClient, 'http://127.0.0.1:18081/json_rpc');
    }

    public function testGetNetStats(): void
    {
        $result = self::$rpcClient->getNetStats();
        $this->assertSame(ResponseStatus::OK, $result->status);
        $this->assertGreaterThan(0, $result->startTime);
    }

    public function testGetHeight(): void
    {
        $result = self::$rpcClient->getHeight();
        $this->assertSame(ResponseStatus::OK, $result->status);
        $this->assertGreaterThan(0, $result->height);
    }
}
