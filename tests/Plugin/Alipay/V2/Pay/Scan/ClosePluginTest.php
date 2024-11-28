<?php

namespace Yansongda\Pay\Tests\Plugin\Alipay\V2\Pay\Scan;

use Yansongda\Artful\Direction\ResponseDirection;
use Yansongda\Pay\Plugin\Alipay\V2\Pay\Scan\ClosePlugin;
use Yansongda\Artful\Rocket;
use Yansongda\Pay\Tests\TestCase;

class ClosePluginTest extends TestCase
{
    protected ClosePlugin $plugin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->plugin = new ClosePlugin();
    }

    public function testNormal()
    {
        $rocket = (new Rocket())
            ->setParams([]);

        $result = $this->plugin->assembly($rocket, function ($rocket) { return $rocket; });

        self::assertNotEquals(ResponseDirection::class, $result->getDirection());
        self::assertStringContainsString('alipay.trade.close', $result->getPayload()->toJson());
    }
}
