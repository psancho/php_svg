<?php declare(strict_types = 1);

namespace Psancho\SvgTools;

use Countable;

/**
 * Representation for the SVG attribute  path/@d
 *
 * @category Tools
 * @package  SvgTools
*/
class ShapeStep
{
    public function __construct(public string $step = '') 
    {
    }
}