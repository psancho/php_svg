<?php declare(strict_types = 1);

namespace Psancho\SvgTools;

/**
 * Representation for the SVG attribute  path/@d
 *
 * @category Tools
 * @package  SvgTools
*/
class Point
{
    public function __construct(public float|int $x = 0, public float|int $y = 0) {}

    public function substract(self $refPoint): static
    {
        return new static($this->x - $refPoint->x, $this->y - $refPoint->y);
    }

    public function add(self $refPoint): static
    {
        return new static($this->x + $refPoint->x, $this->y + $refPoint->y);
    }
}
