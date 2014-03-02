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

use MusicBrainz\Connector\ConnectorInterface;
use MusicBrainz\Entity\Alias;
use MusicBrainz\Entity\AliasType;
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

    /**
     * Test that we can get and set the AliasType
     *
     * @covers \MusicBrainz\Entity\Alias::getType
     * @covers \MusicBrainz\Entity\Alias::setType
     */
    public function testGetSetType()
    {
        $alias = new Alias();
        $type = new AliasType(ConnectorInterface::ALIAS_TYPE_AREA_NAME);

        $this->assertNull($alias->getType());
        $this->assertSame($alias, $alias->setType($type));
        $this->assertSame($type, $alias->getType());
    }

    /**
     * Test that we can get and set the beginDate
     *
     * @covers \MusicBrainz\Entity\Alias::getBeginDate
     * @covers \MusicBrainz\Entity\Alias::setBeginDate
     */
    public function testGetSetBeginDate()
    {
        $alias = new Alias();
        $date = '1981';

        $this->assertNull($alias->getBeginDate());
        $this->assertSame($alias, $alias->setBeginDate($date));
        $this->assertEquals($date, $alias->getBeginDate());
    }

    /**
     * Test that we can get and set the endDate
     *
     * @covers \MusicBrainz\Entity\Alias::getEndDate
     * @covers \MusicBrainz\Entity\Alias::setEndDate
     */
    public function testGetSetEndDate()
    {
        $alias = new Alias();
        $date = '1989';

        $this->assertNull($alias->getEndDate());
        $this->assertSame($alias, $alias->setEndDate($date));
        $this->assertEquals($date, $alias->getEndDate());
    }
}
