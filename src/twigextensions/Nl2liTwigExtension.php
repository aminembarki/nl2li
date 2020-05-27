<?php
/**
 * nl2li plugin for Craft CMS 3.x
 *
 * Simple Twig filter to turn a multiline text field into list items.
 *
 * @link      https://github.com/aminembarki
 * @copyright Copyright (c) 2020 Amine Mbarki
 */

namespace aminembarki\nl2li\twigextensions;

use aminembarki\nl2li\Nl2li;

use Craft;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

/**
 * Twig can be extended in many ways; you can add extra tags, filters, tests, operators,
 * global variables, and functions. You can even extend the parser itself with
 * node visitors.
 *
 * http://twig.sensiolabs.org/doc/advanced.html
 *
 * @author    Amine Mbarki
 * @package   Nl2li
 * @since     1.0.0
 */
class Nl2liTwigExtension extends AbstractExtension
{
    // Public Methods
    // =========================================================================

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'Nl2li';
    }

    /**
     * Returns an array of Twig filters, used in Twig templates via:
     *
     *      {{ 'something' | someFilter }}
     *
     * @return array
     */
    public function getFilters()
    {
        return [
            new TwigFilter('nl2li', [$this, 'nl2li']),
        ];
    }

    /**
     * Returns an array of Twig functions, used in Twig templates via:
     *
     *      {% set this = someFunction('something') %}
     *
    * @return array
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('nl2li', [$this, 'nl2li', ['is_safe' => ['html']]]),
        ];
    }

    /**
     * Our function called via Twig; it can do anything you want
     *
     * @param null $text
     *
     * @return string
     */
    public function nl2li($text = null)
    {

        return '<li>'.str_replace( "\n", "</li><li>", $text ).'</li>';
    }
}
