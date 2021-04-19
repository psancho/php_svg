<?php declare(strict_types = 1);

namespace Psancho\SvgTools;

use Psancho\SvgTools\ShapeStep;

/**
 * path/@d H (Horizontal LineTo)
 *
 * H x
 *
 * @category Tools
 * @package  SvgTools
*/
class ShapeStepH extends ShapeStep
{
    protected static int $expectedArgCount = 1;
}
