<?php declare(strict_types = 1);

namespace Psancho\SvgTools;

use Countable;
use Psancho\SvgTools\ShapeStep;
use Psancho\SvgTools\ShapeStepA;
use Psancho\SvgTools\ShapeStepC;
use Psancho\SvgTools\ShapeStepH;
use Psancho\SvgTools\ShapeStepL;
use Psancho\SvgTools\ShapeStepM;
use Psancho\SvgTools\ShapeStepQ;
use Psancho\SvgTools\ShapeStepS;
use Psancho\SvgTools\ShapeStepT;
use Psancho\SvgTools\ShapeStepV;
use Psancho\SvgTools\ShapeStepZ;

/**
 * Representation for the SVG attribute  path/@d
 *
 * @category Tools
 * @package  SvgTools
*/
class Shape implements Countable
{
    /** @var ShapeStep[] */
    protected array $steps;

    public function __construct(string $pattern = '')
    {
        $matches = [];
        $canonicPattern = static::canonize($pattern);
        preg_match_all('/[a-zA-Z][^a-zA-Z]*/', $canonicPattern, $matches);
        $step = null;
        foreach ($matches[0] as $patternStep) {
            $step = static::buildStep($patternStep, $step);
        }
        assert(!is_null($step));
        $this->steps = [$step];
        while ($step = $step->previous) {
            array_unshift($this->steps, $step);
        }
    }

    public static function canonize(string $pattern = ''): string
    {
        return preg_replace([
            '/[ \t\n\r\v,]+/',
            '/ ([A-Za-z])/',
            '/([A-Za-z]) (?![A-Za-z])/',
            '/ $/',
        ], [
            ' ',
            '$1',
            '',
        ], $pattern) ?: '';
    }

    protected static function buildStep(string $patternStep = '', ?ShapeStep $prev = null): ShapeStep
    {
        $stepType = substr($patternStep, 0, 1);
        switch (strtolower($stepType)) {
        case 'a':
            return new ShapeStepA($patternStep, $prev);
        case 'c':
            return new ShapeStepC($patternStep, $prev);
        case 'h':
            return new ShapeStepH($patternStep, $prev);
        case 'l':
            return new ShapeStepL($patternStep, $prev);
        case 'm':
            return new ShapeStepM($patternStep, $prev);
        case 'q':
            return new ShapeStepQ($patternStep, $prev);
        case 's':
            return new ShapeStepS($patternStep, $prev);
        case 't':
            return new ShapeStepT($patternStep, $prev);
        case 'v':
            return new ShapeStepV($patternStep, $prev);
        case 'z':
            return new ShapeStepZ($patternStep, $prev);

        default:
            return new ShapeStepA($patternStep, $prev);
        }
    }

    public function count(): int
    {
        return count($this->steps);
    }
}
