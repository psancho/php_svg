<?php declare(strict_types = 1);

namespace Psancho\SvgTools;

use Psancho\SvgTools\ShapeStep;

/**
 * path/@d A (Elliptical Arc)
 *
 * A rx ry x-axis-rotation large-arc-flag sweep-flag x y
 *
 * @category Tools
 * @package  SvgTools
*/
class ShapeStepA extends ShapeStep
{
    protected static string $shapeName = 'Elliptical Arc';
    protected static int $expectedArgCount = 7;
    protected static int $indexEndX = 5;
    protected static int $indexEndY = 6;
}
