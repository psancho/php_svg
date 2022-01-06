<?php declare(strict_types = 1);

namespace Psancho\SvgTools;

use Psancho\SvgTools\ShapeStep;

/**
 * path/@d Z (ClosePath)
 *
 * @category Tools
 * @package  SvgTools
*/
class ShapeStepZ extends ShapeStep
{
    protected static string $shapeName = 'ClosePath';

    public function getFinalPoint(): Point
    {
        return clone $this->start;
    }
}
