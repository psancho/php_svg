<?php declare(strict_types = 1);

namespace Psancho\SvgTools;

use Psancho\SvgTools\ShapeStep;

/**
 * path/@d Q (Quadratic CurveTo)
 *
 * Q x1 y1, x y
 *
 * @category Tools
 * @package  SvgTools
*/
class ShapeStepQ extends ShapeStep
{
    protected static string $shapeName = 'Quadratic CurveTo';
    protected static int $expectedArgCount = 4;
    protected static int $indexEndX = 2;
    protected static int $indexEndY = 3;
}
