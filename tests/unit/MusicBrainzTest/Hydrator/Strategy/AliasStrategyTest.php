<?php
/**
 * AliasStrategyTest.php
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Hydrator\Strategy
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 *
 * Copyright (C) 2014  David White
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
 * along with this program.  If not, see [http://www.gnu.org/licenses/].
 */
namespace MusicBrainzTest\Hydrator\Strategy;

use MusicBrainz\Entity\Alias;
use MusicBrainz\Entity\Locale;
use MusicBrainz\Entity\Name;
use MusicBrainz\Entity\Primary;
use MusicBrainz\Hydrator\Strategy\AliasStrategy;
use PHPUnit_Framework_TestCase;
use stdClass;


/**
 * AliasStrategyTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Hydrator\Strategy
 */
class AliasStrategyTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can hydrate an Alias instance
     *
     * @covers \MusicBrainz\Hydrator\Strategy\AliasStrategy::hydrate
     */
    public function testHydrate()
    {
        $aliasStrategy = new AliasStrategy();
        $sortName = 'Metallica';
        $locale = 'ko_KR';
        $primary = 'primary';
        $value = array(
            'sort-name' => $sortName,
            'locale' => $locale,
            'primary' => $primary
        );

        $alias = $aliasStrategy->hydrate($value);

        $this->assertInstanceOf('\MusicBrainz\Entity\Alias', $alias);
        $this->assertEquals($alias->getSortName(), $sortName);
        $this->assertEquals($alias->getPrimary(), $primary);
        $this->assertEquals($alias->getLocale(), $locale);
    }

    /**
     * Test that attempting to hydrate using a non array parameter returns null
     *
     * @covers \MusicBrainz\Hydrator\Strategy\AliasStrategy::hydrate
     */
    public function testHydrateReturnsNull()
    {
        $aliasStrategy = new AliasStrategy();

        $this->assertNull($aliasStrategy->hydrate(new stdClass()));
    }

    /**
     * Test that we can extract the values from an Alias instance
     *
     * @covers \MusicBrainz\Hydrator\Strategy\AliasStrategy::extract
     */
    public function testExtract()
    {
        $primary = 'Primary';
        $locale = 'ko_KR';
        $sortName = 'Metallica';
        $alias = new Alias();
        $alias->setPrimary(new Primary($primary));
        $alias->setLocale(new Locale($locale));
        $alias->setSortName(new Name($sortName));
        $aliasStrategy = new AliasStrategy();

        $values = $aliasStrategy->extract($alias);

        $this->assertInternalType('array', $values);
        $this->assertArrayHasKey('primary', $values);
        $this->assertArrayHasKey('locale', $values);
        $this->assertArrayHasKey('sortName', $values);
        $this->assertEquals($values['primary'], $primary);
        $this->assertEquals($values['sortName'], $sortName);
        $this->assertEquals($values['locale'], $locale);
    }

    /**
     * Test that attempting to extract the values from a non Alias instance
     * returns null
     *
     * @covers \MusicBrainz\Hydrator\Strategy\AliasStrategy::extract
     */
    public function testExtractReturnsNull()
    {
        $aliasStrategy = new AliasStrategy();

        $this->assertNull($aliasStrategy->extract(new \stdClass()));
    }
}
