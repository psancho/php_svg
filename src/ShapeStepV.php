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
    protected static int $indexEndY = 0;

    public function getFinalPoint(): Point
    {
        $x = $this->absolute ? $this->previous?->end->x : 0;
        assert(is_int($x) || is_float($x));
        return new Point(
            $x,
            self::strToNumber($this->argSequence[static::$indexEndY])
        );
    }
}
