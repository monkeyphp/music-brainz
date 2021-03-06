<?php
/**
 * ScriptTest.php
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 *
 * Copyright (C) David White
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
namespace MusicBrainzTest\Entity;

use MusicBrainz\Entity\Script;
use PHPUnit_Framework_TestCase;

/**
 * ScriptTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class ScriptTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can construct an instance of Script
     *
     * @covers \MusicBrainz\Entity\Script::__construct
     */
    public function test__construct()
    {
        $string = 'Latn';
        $script = new Script($string);

        $this->assertInstanceOf('\MusicBrainz\Entity\Script', $script);
    }

    /**
     * @covers \MusicBrainz\Entity\Script::__toString
     */
    public function test__toString()
    {
        $string = 'Latn';
        $script = new Script($string);

        $this->assertEquals($string, $script);
    }
}