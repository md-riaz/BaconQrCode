<?php

declare(strict_types=1);

namespace BaconQrCode\Renderer\Eye;

use BaconQrCode\Renderer\Eye\EyeInterface;
use BaconQrCode\Renderer\Path\Path;
use SimpleSoftwareIO\QrCode\Singleton;

final class LeafEye implements EyeInterface, Singleton
{
    private static $instance;

    private function __construct() {}

    public static function instance(): self
    {
        return self::$instance ?: self::$instance = new self();
    }

    public function getExternalPath(): Path
    {
        return (new Path())
            ->move(-3.5, 3.5)
            ->curve(-3.5, -3.5, -3.5, -3.5, 3.5, -3.5)
            ->move(3.5, -3.5)
            ->curve(3.5, 3.5, 3.5, 3.5, -3.5, 3.5)
            ->close()
            ->move(-2.5, 2.5)
            ->curve(-2.5, -2.5, -2.5, -2.5, 2.5, -2.5)
            ->move(2.5, -2.5)
            ->curve(2.5, 2.5, 2.5, 2.5, -2.5, 2.5)
        ;
    }

    public function getInternalPath(): Path
    {
        return (new Path())
            ->move(-1.5, 1.5)
            ->curve(-1.5, -1.5, -1.5, -1.5, 1.5, -1.5)
            ->move(1.5, -1.5)
            ->curve(1.5, 1.5, 1.5, 1.5, -1.5, 1.5)
        ;
    }
}
