<?php declare(strict_types = 1);

namespace Psancho\SvgTools;

use Psancho\SvgTools\Point;
use UnexpectedValueException;

/**
 * Representation for the SVG attribute  path/@d
 *
 * @category Tools
 * @package  SvgTools
*/
class ShapeStep
{
    /** @var string[] */
    protected array $argSequence;
    protected int $argCount;
    protected bool $absolute;
    protected Point $start;
    protected Point $end;
    protected Point $diff;
    protected string $type;

    protected static string $shapeName = '';
    protected static int $expectedArgCount = 0;
    protected static int $indexEndX = 0;
    protected static int $indexEndY = 0;

    public function __construct(public string $step = '', public ?self $previous = null)
    {
        $this->type = (substr($step, 0, 1));
        $this->argSequence = strlen($step) > 1 ? explode(' ', substr($step, 1)) : [];
        $this->argCount = count($this->argSequence);
        if ((static::$expectedArgCount === 0 && $this->argCount !== 0)
            || (static::$expectedArgCount !== 0 && $this->argCount % static::$expectedArgCount)
        ) {
            throw new UnexpectedValueException(sprintf("%s: expected a multiple of %d args, found %d.",
                static::$shapeName, static::$expectedArgCount, $this->argCount));
        }

        if ($this->argCount > static::$expectedArgCount) {
            $stepPrev = $this->type . implode(' ', array_slice($this->argSequence, 0, $this->argCount - static::$expectedArgCount));
            $this->previous = new static($stepPrev, $previous);//@phpstan-ignore-line
            $this->argSequence = array_slice($this->argSequence, -static::$expectedArgCount);
            $this->argCount = count($this->argSequence);
            $this->step = $this->type . implode(' ', $this->argSequence);
        }

        $this->absolute = $this->type < 'a';
        $this->start = $this->previous ? $this->previous->end : new Point;
        if ($this->absolute) {
            $this->end = $this->getFinalPoint();
            $this->diff = $this->end->substract($this->start);
        } else {
            $this->diff = $this->getFinalPoint();
            $this->end = $this->start->add($this->diff);
        }
    }

    public function getFinalPoint(): Point
    {
        return new Point(
            self::strToNumber($this->argSequence[static::$indexEndX]),
            self::strToNumber($this->argSequence[static::$indexEndY])
        );
    }

    protected static function strToNumber(string $str): int|float
    {
        $int = intval($str);
        return (strval($int) === $str) ? $int : floatval($str);
    }
}
