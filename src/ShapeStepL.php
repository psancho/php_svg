<?php declare(strict_types = 1);

namespace Psancho\SvgTools;

use Psancho\SvgTools\ShapeStep;

/**
 * path/@d L (LineTo)
 *
 * L x y
 *
 * @category Tools
 * @package  SvgTools
*/
class ShapeStepL extends ShapeStep
{
    protected static string $shapeName = 'LineTo';
    protected static int $expectedArgCount = 2;
    protected static int $indexEndX = 0;
    protected static int $indexEndY = 1;
}
