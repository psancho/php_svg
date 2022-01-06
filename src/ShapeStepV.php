<?php declare(strict_types = 1);

namespace Psancho\SvgTools;

use Psancho\SvgTools\ShapeStep;

/**
 * path/@d V (Vertical LineTo)
 *
 * V y
 *
 * @category Tools
 * @package  SvgTools
*/
class ShapeStepV extends ShapeStep
{
    protected static string $shapeName = 'Vertical LineTo';
    protected static int $expectedArgCount = 1;
}
