<?php declare(strict_types = 1);

namespace Psancho\SvgTools;

use Psancho\SvgTools\ShapeStep;

/**
 * path/@d T (Shorthand Quadratic CurveTo)
 *
 * T x y
 *
 * @category Tools
 * @package  SvgTools
*/
class ShapeStepT extends ShapeStep
{
    protected static string $shapeName = 'Shorthand Quadratic CurveTo';
    protected static int $expectedArgCount = 2;
    protected static int $indexEndX = 0;
    protected static int $indexEndY = 1;
}
