<?php
/**
 * AliasListTest.php
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

use MusicBrainz\Entity\Alias;
use MusicBrainz\Entity\AliasList;
use PHPUnit_Framework_TestCase;

/**
 * AliasList
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class AliasListTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can call the getAliases method and recieve
     * an empty array
     *
     * @covers \MusicBrainz\Entity\AliasList::getAliases
     */
    public function testGetAliasesReturnsArray()
    {
        $aliasList = new AliasList();

        $aliases = $aliasList->getAliases();

        $this->assertInternalType('array', $aliases);
    }

    /**
     * Test that we can add an Alias
     *
     * @covers \MusicBrainz\Entity\AliasList::addAlias
     */
    public function testAddAlias()
    {
        $aliasList = new AliasList();
        $alias = new Alias();

        $this->assertEmpty($aliasList->getAliases());
        $this->assertSame($aliasList, $aliasList->addAlias($alias));
        $this->assertCount(1, $aliasList->getAliases());
    }

    /**
     * Test that we can set the aliases
     *
     * @covers \MusicBrainz\Entity\AliasList::setAliases
     */
    public function testSetAliases()
    {
        $aliasList = new AliasList();
        $aliases = array(
            new Alias(),
            new Alias(),
            new Alias(),
        );
        $this->assertEmpty($aliasList->getAliases());
        $this->assertSame($aliasList, $aliasList->setAliases($aliases));
        $this->assertCount(count($aliases), $aliasList->getAliases());
    }

    /**
     * Test that we can set the aliases
     *
     * @covers \MusicBrainz\Entity\AliasList::current
     * @covers \MusicBrainz\Entity\AliasList::key
     * @covers \MusicBrainz\Entity\AliasList::next
     * @covers \MusicBrainz\Entity\AliasList::rewind
     * @covers \MusicBrainz\Entity\AliasList::valid
     */
    public function testIterator()
    {
        $aliasList = new AliasList();
        $aliases = array(
            new Alias(),
            new Alias(),
            new Alias(),
        );
        $count = 0;
        $this->assertSame($aliasList, $aliasList->setAliases($aliases));
        foreach ($aliasList as $alias) {
            $this->assertInstanceOf('\MusicBrainz\Entity\Alias', $alias);
            $count++;
        }
        $this->assertCount($count, $aliases);
    }
}