<?php declare(strict_types = 1);

namespace Psancho\SvgTools;

use Psancho\SvgTools\ShapeStep;

/**
 * path/@d C (CurveTo)
 *
 * C x1 y1, x2 y2, x y
 *
 * @category Tools
 * @package  SvgTools
*/
class ShapeStepC extends ShapeStep
{
    protected static string $shapeName = 'EllipticalArc';
    protected static int $expectedArgCount = 6;
}
