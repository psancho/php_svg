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
    protected static string $shapeName = 'Horizontal LineTo';
    protected static int $expectedArgCount = 1;
    protected static int $indexEndX = 0;

    public function getFinalPoint(): Point
    {
        $y = $this->absolute ? $this->previous?->end->y : 0;
        assert(is_int($y) || is_float($y));
        return new Point(
            self::strToNumber($this->argSequence[static::$indexEndX]),
            $y
        );
    }
}
