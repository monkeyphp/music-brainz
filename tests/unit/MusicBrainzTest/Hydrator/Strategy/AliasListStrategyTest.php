<?php
/**
 * AliasListStrategyTest.php
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
use MusicBrainz\Entity\AliasList;
use MusicBrainz\Entity\Name;
use MusicBrainz\Hydrator\Strategy\AliasListStrategy;
use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * AliasListStrategy
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Hydrator\Strategy
 */
class AliasListStrategyTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can hydrate a AliasList from an array of values
     *
     * @covers \MusicBrainz\Hydrator\Strategy\AliasListStrategy::hydrate
     */
    public function testHydrate()
    {
        $aliasListStrategy = new AliasListStrategy();
        $sortName = 'Metallica';
        $locale = 'ko_KR';
        $primary = 'primary';
        $values = array(
            'alias' => array(
                array(
                    'sort-name' => $sortName,
                    'locale' => $locale,
                    'primary' => $primary
                )
            )
        );

        $aliasList = $aliasListStrategy->hydrate($values);

        $this->assertInstanceOf('\MusicBrainz\Entity\AliasList', $aliasList);
    }

    /**
     * Test that attempting to hydrate using a non array value returns null
     *
     * @covers \MusicBrainz\Hydrator\Strategy\AliasListStrategy::hydrate
     */
    public function testHydrateReturnsNull()
    {
        $aliasListStrategy = new AliasListStrategy();

        $this->assertNull($aliasListStrategy->hydrate(new stdClass()));
    }

    /**
     * Test that attempting to extract the values from a non AliasList returns null
     *
     * @covers \MusicBrainz\Hydrator\Strategy\AliasListStrategy::extract
     */
    public function testExtractReturnsNull()
    {
        $aliasListStrategy = new AliasListStrategy();

        $this->assertNull($aliasListStrategy->extract(new stdClass()));
    }

    /**
     * Test that we can extract the values from an instance of AliasList
     *
     * @covers \MusicBrainz\Hydrator\Strategy\AliasListStrategy::extract
     */
    public function testExtract()
    {
        $aliasListStrategy = new AliasListStrategy();
        $aliasList = new AliasList();

        $alias = new Alias();
        $alias->setSortName(new Name('Metallica'));

        $aliasList->addAlias($alias);

        $extracted = $aliasListStrategy->extract($aliasList);

        $this->assertInternalType('array', $extracted);
        $this->assertArrayHasKey('aliases', $extracted);
        $this->assertCount(1, $extracted['aliases']);
    }
}
