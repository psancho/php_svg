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
    protected static int $expectedArgCount = 2;
}
