<?php

declare(strict_types=1);

namespace Yansongda\Pay\Plugin\Jsb\Pay\Scan;

use Closure;
use Yansongda\Artful\Contract\PluginInterface;
use Yansongda\Artful\Logger;
use Yansongda\Artful\Rocket;

/**
 * @see https://github.com/yansongda/pay/pull/1002
 */
class RefundPlugin implements PluginInterface
{
    public function assembly(Rocket $rocket, Closure $next): Rocket
    {
        Logger::debug('[Jsb][Pay][Scan][RefundPlugin] 插件开始装载', ['rocket' => $rocket]);

        $rocket->mergePayload([
            'deviceNo' => '1234567890',
            'service' => 'payRefund',
        ]);

        Logger::info('[Jsb][Pay][Scan][RefundPlugin] 插件装载完毕', ['rocket' => $rocket]);

        return $next($rocket);
    }
}
