<?php declare(strict_types = 1);

namespace Psancho\SvgTools;

use Psancho\SvgTools\ShapeStep;
use UnexpectedValueException;

/**
 * path/@d M (MoveTo)
 *
 * M x y
 *
 * @category Tools
 * @package  SvgTools
*/
class ShapeStepM extends ShapeStep
{
    protected static string $shapeName = 'MoveTo';
    protected static int $expectedArgCount = 2;
}
