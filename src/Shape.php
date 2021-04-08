<?php declare(strict_types = 1);

namespace Psancho\SvgTools;

use Countable;

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
        preg_match_all('/[a-zA-Z][^a-zA-Z]*/', $pattern, $matches);
        $this->steps = $matches[0];
    }

    public function count(): int
    {
        return count($this->steps);
    }
}