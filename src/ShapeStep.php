<?php declare(strict_types = 1);

namespace Psancho\SvgTools;

use UnexpectedValueException;

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

    protected static int $expectedArgCount = 0;

    public function __construct(public string $step = '', public ?self $previous = null)
    {
        $this->type = (substr($step, 0, 1));
        $this->argSequence = strlen($step) > 1 ? explode(' ', substr($step, 1)) : [];
        $this->argCount = count($this->argSequence);
        if ((static::$expectedArgCount === 0 && $this->argCount !== 0)
            || (static::$expectedArgCount !== 0 && $this->argCount % static::$expectedArgCount)
        ) {
            throw new UnexpectedValueException(sprintf("MoveTo: expected a multiple of %d args, found %d.",
                static::$expectedArgCount, $this->argCount));
        }
        if ($this->argCount > static::$expectedArgCount) {
            $stepPrev = $this->type . implode(' ', array_slice($this->argSequence, 0, $this->argCount - static::$expectedArgCount));
            $this->previous = new static($stepPrev, $previous);
            $this->argSequence = array_slice($this->argSequence, -static::$expectedArgCount);
        }
    }
}
