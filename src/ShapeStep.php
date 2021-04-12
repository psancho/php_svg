<?php declare(strict_types = 1);

namespace Psancho\SvgTools;

/**
 * Representation for the SVG attribute  path/@d
 *
 * @category Tools
 * @package  SvgTools
*/
class ShapeStep
{
    protected array $argSequence;

    public function __construct(public string $step = '')
    {
        $this->argSequence = explode(' ', substr($step, 1));

        $pipi = (substr($step, 0, 1));
        $caca = count($this->argSequence);
    }
}
