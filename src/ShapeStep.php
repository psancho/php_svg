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
    protected int $argCount;
    protected string $type;

    public function __construct(public string $step = '', public ?self $previous = null)
    {
        $this->type = (substr($step, 0, 1));
        $this->argSequence = strlen($step) > 1 ? explode(' ', substr($step, 1)) : [];
        $this->argCount = count($this->argSequence);
    }
}
