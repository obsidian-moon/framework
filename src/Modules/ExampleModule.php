<?php
/**
 * An example of what you can do to extend with modules
 *
 * Obsidian Moon Engine by Dark Prospect Games
 * An Open Source, Lightweight and 100% Modular Framework in PHP
 *
 * PHP version 7
 *
 * @category  ObsidianMoonEngine
 * @package   ObsidianMoonDevelopment\ObsidianMoonEngine
 * @author    Alfonso E Martinez, III <admin@darkprospect.net>
 * @copyright 2011-2018 Dark Prospect Games, LLC
 * @license   MIT https://darkprospect.net/MIT-License.txt
 * @link      https://github.com/dark-prospect-games/obsidian-moon-engine/
 */
namespace App\Modules;

use ObsidianMoonDevelopment\ObsidianMoonEngine\AbstractModule;

/**
 * Class ExampleModule
 *
 * @category ObsidianMoonEngine
 * @package  ObsidianMoonDevelopment\ExampleApp\Modules
 * @author   Alfonso E Martinez, III <admin@darkprospect.net>
 * @license  MIT https://darkprospect.net/MIT-License.txt
 * @link     https://github.com/dark-prospect-games/obsidian-moon-engine/
 * @since    1.3.0
 * @uses     Core
 * @uses     AbstractModule
 */

class ExampleModule extends AbstractModule
{
    /**
     * Says hello to the person passed to it.
     *
     * @param string $person Name of the person passed to be displayed.
     *
     * @return string
     */
    public function sayHello($person): string
    {
        return 'Hello, ' . $person . '!';
    }
}
