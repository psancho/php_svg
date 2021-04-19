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
    protected $steps;

    public function __construct(string $pattern = '')
    {
        $matches = [];
        $this->steps = [];
        $canonicPattern = static::canonize($pattern);
        preg_match_all('/[a-zA-Z][^a-zA-Z]*/', $canonicPattern, $matches);
        foreach ($matches[0] as $patternStep) {
            $prev = end($this->steps) ?: null;
            array_push($this->steps, static::buildStep($patternStep, $prev));
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
            '$1',
            '',
        ], $pattern);
    }

    protected static function buildStep(string $patternStep = '', $prev = null): ShapeStep
    {
        $stepType = substr($patternStep, 0, 1);
        switch (strtolower($stepType)) {
        case 'a':
            return new ShapeStepA($patternStep, $prev);
            break;
        case 'c':
            return new ShapeStepC($patternStep, $prev);
            break;
        case 'h':
            return new ShapeStepH($patternStep, $prev);
            break;
        case 'l':
            return new ShapeStepL($patternStep, $prev);
            break;
        case 'm':
            return new ShapeStepM($patternStep, $prev);
            break;
        case 'q':
            return new ShapeStepQ($patternStep, $prev);
            break;
        case 's':
            return new ShapeStepS($patternStep, $prev);
            break;
        case 't':
            return new ShapeStepT($patternStep, $prev);
            break;
        case 'v':
            return new ShapeStepV($patternStep, $prev);
            break;
        case 'z':
            return new ShapeStepZ($patternStep, $prev);
            break;

        default:
        return new ShapeStepA($patternStep, $prev);
        break;
        }
        return new ShapeStep($patternStep, $prev);
    }

    public function count(): int
    {
        return count($this->steps);
    }
}
