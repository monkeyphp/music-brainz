<?php

/*
 * Copyright (C) Error: on line 4, column 33 in Templates/Licenses/license-gpl30.txt
  The string doesn't match the expected date/time format. The string to parse was: "13-Mar-2014". The expected format was: "MMM d, yyyy". David White <david@monkeyphp.com>
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

namespace MusicBrainzTest\Hydrator\Strategy;

use MusicBrainz\Hydrator\Strategy\AreaSearchStrategy;
use PHPUnit_Framework_TestCase;

/**
 * Description of AreaSearchStrategyTest
 *
 * @author David White <david@monkeyphp.com>
 */
class AreaSearchStrategyTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can extract the values from an instance of AreaSearch
     *
     * @covers \MusicBrainz\Hydrator\Strategy\AreaSearchStrategy::extract
     */
    public function testExtract()
    {
        $this->markTestIncomplete();
    }

    /**
     * Test that we can hydrate an instance of AreaSearch
     *
     * @covers \MusicBrainz\Hydrator\Strategy\AreaSearchStrategy::hydrate
     */
    public function testHydrate()
    {
        $count = 1;
        $offset = 0;
        $name = 'Finland';
        $mbid = '6a264f94-6ff1-30b1-9a81-41f7bfabd616';
        $values = array(
            'area-list' => array(
                'area' => array(
                    'name' => $name,
                    'iso-3166-1-code-list' => array(
                        'iso-3166-1-code' => 'FI'
                    ),
                    'life-span' => array(
                        'ended' => false,
                    ),
                    'alias-list' => array(
                        'alias' => array(
                            0 => array(
                                'value' => 'フィンランド',
                                '@attributes' => array (
                                    'locale' => 'ja',
                                    'sort-name' => 'フィンランド',
                                    'primary' => 'primary',
                                )
                            )
                        )
                    ),
                    '@attributes' => array(
                        'id' => $mbid,
                        'type' => 'Country',
                        'score' => 100,
                    ),
                ),
                '@attributes' => array(
                    'count' => $count,
                    'offset' => $offset
                )
            )
        );

        $areaSearchStrategy = new AreaSearchStrategy();
        $areaSearch = $areaSearchStrategy->hydrate($values);

        $this->assertInstanceOf('\MusicBrainz\Entity\AreaSearch', $areaSearch);

        // AreaList
        $areaList = $areaSearch->getAreaList();
        $this->assertInstanceOf('\MusicBrainz\Entity\AreaList', $areaList);

        // count
        $this->assertEquals($count, $areaList->getCount()->__toString());
        // offset
        $this->assertEquals($offset, $areaList->getOffset()->__toString());

        // Area
        $areas = $areaList->getAreas();
        $area = $areas[0];
        $this->assertInstanceOf('\MusicBrainz\Entity\Area', $area);
        $this->assertEquals($name, $area->getName()->__toString());
        $this->assertEquals($mbid, $area->getMbid()->__toString());

        $isoCodeList = $area->getIso31661CodeList();
        $this->assertCount(1, $isoCodeList->getIso31661Codes());


    }
}
