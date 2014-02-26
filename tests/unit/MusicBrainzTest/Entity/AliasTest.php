<?php
/**
 * AliasTest.php
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
use MusicBrainz\Entity\Locale;
use MusicBrainz\Entity\Name;
use MusicBrainz\Entity\Primary;
use PHPUnit_Framework_TestCase;

/**
 * AliasList
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 */
class AliasTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can get and set the locale
     *
     * @covers \MusicBrainz\Entity\Alias::getLocale
     * @covers \MusicBrainz\Entity\Alias::setLocale
     */
    public function testGetSetLocale()
    {
        $alias = new Alias();
        $locale = new Locale('ko_KR');

        $this->assertNull($alias->getLocale());
        $this->assertSame($alias, $alias->setLocale($locale));
        $this->assertSame($locale, $alias->getLocale());
    }

    /**
     * Test that we can get and set the sortName
     *
     * @covers \MusicBrainz\Entity\Alias::getSortName
     * @covers \MusicBrainz\Entity\Alias::setSortName
     */
    public function testGetSetSortName()
    {
        $alias = new Alias();
        $sortName = new Name('메탈리카');

        $this->assertNull($alias->getSortName());
        $this->assertSame($alias, $alias->setSortName($sortName));
        $this->assertSame($sortName, $alias->getSortName());
    }

    /**
     * Test that we can get and set the primary
     *
     * @covers \MusicBrainz\Entity\Alias::getPrimary
     * @covers \MusicBrainz\Entity\Alias::setPrimary
     */
    public function testGetSetPrimary()
    {
        $alias = new Alias();
        $primary = new Primary("primary");

        $this->assertNull($alias->getPrimary());
        $this->assertSame($alias, $alias->setPrimary($primary));
        $this->assertSame($primary, $alias->getPrimary());
    }

}
