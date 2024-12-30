<?php

declare(strict_types=1);

namespace BaconQrCode\Renderer\Eye;

use BaconQrCode\Renderer\Eye\EyeInterface;
use BaconQrCode\Renderer\Path\Path;
use SimpleSoftwareIO\QrCode\Singleton;

final class DiamondEye implements EyeInterface, Singleton
{
    private static $instance;

    private function __construct() {}

    public static function instance(): self
    {
        return self::$instance ?: self::$instance = new self();
    }

    public function getExternalPath(): Path
    {
        return new Path();
    }

    public function getInternalPath(): Path
    {
        return (new Path())
            ->move(1.5, 0)
            ->ellipticArc(0., 0., 0., false, true, 0., 1.5)
            ->ellipticArc(0., 0., 0., false, true, -1.5, 0.)
            ->ellipticArc(0., 0., 0., false, true, 0., -1.5)
            ->ellipticArc(0., 0., 0., false, true, 1.5, 0.)
            ->close()
        ;
    }
}
