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
            array_push($this->steps, static::buildStep($patternStep));
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

    protected static function buildStep(string $patternStep = ''): ShapeStep
    {
        $stepType = substr($patternStep, 0, 1);
        switch (strtolower($stepType)) {
        case 'a':
            return new ShapeStepA($patternStep);
            break;
        case 'c':
            return new ShapeStepC($patternStep);
            break;
        case 'h':
            return new ShapeStepH($patternStep);
            break;
        case 'l':
            return new ShapeStepL($patternStep);
            break;
        case 'm':
            return new ShapeStepM($patternStep);
            break;
        case 'q':
            return new ShapeStepQ($patternStep);
            break;
        case 's':
            return new ShapeStepS($patternStep);
            break;
        case 't':
            return new ShapeStepT($patternStep);
            break;
        case 'v':
            return new ShapeStepV($patternStep);
            break;
        case 'z':
            return new ShapeStepZ($patternStep);
            break;

        default:
        return new ShapeStepA($patternStep);
        break;
        }
        return new ShapeStep($patternStep);
    }

    public function count(): int
    {
        return count($this->steps);
    }
}
