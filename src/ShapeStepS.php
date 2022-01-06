<?php declare(strict_types = 1);

namespace Psancho\SvgTools;

use Psancho\SvgTools\ShapeStep;

/**
 * path/@d S (Shorthand CurveTo)
 *
 * S x2 y2, x y
 *
 * @category Tools
 * @package  SvgTools
*/
class ShapeStepS extends ShapeStep
{
    protected static string $shapeName = 'Shorthand CurveTo';
    protected static int $expectedArgCount = 4;
    protected static int $indexEndX = 2;
    protected static int $indexEndY = 3;
}
