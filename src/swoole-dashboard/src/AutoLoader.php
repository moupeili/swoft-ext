<?php declare(strict_types=1);


namespace Swoft\Swoole\Dashboard;


use Swoft\SwoftComponent;

/**
 * Class AutoLoader
 *
 * @since 2.0
 */
class AutoLoader extends SwoftComponent
{
    /**
     * Get namespace and dirs
     *
     * @return array
     */
    public function getPrefixDirs(): array
    {
        return [
            __NAMESPACE__ => __DIR__,
        ];
    }

    /**
     * @return array
     */
    public function metadata(): array
    {
        return [];
    }

    /**
     * @return array
     */
    public function beans(): array
    {
        return [
            SwooleDashboard::class => [
                'memoryLeakCheck'     => true,
                'blockCheck'          => true,
                'performanceAnalysis' => false,
                'linkTracking'        => true,
            ],
        ];
    }
}
