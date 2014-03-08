<?php
/**
 * LabelStrategyTest.php
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

use MusicBrainz\Hydrator\Strategy\LabelStrategy;
use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * LabelStrategyTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Hydrator\Strategy
 */
class LabelStrategyTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can hydrate an instance of Label
     *
     * @covers \MusicBrainz\Hydrator\Strategy\LabelStrategy::hydrate
     */
    public function testHydrate()
    {
        $id = 'f18f3b31-8263-4de3-966a-fda317492d3d';
        $type = 'Original Production';
        $name = 'Decca Records';
        $labelCode = 171;
        $country = 'US';
        $countryId = '489ce91b-6658-3307-9877-795b68554c98';
        $countryName = 'United States';
        $begin = 1929;
        $values = array(
            'id' => $id,
            'type' => $type,
            'name' => $name,
            'sort-name' => $name,
            'label-code' => $labelCode,
            'country' => $country,
            'area' => array(
                'id' => $countryId,
                'name' => $countryName,
                'sort-name' => $countryName
            ),
            'life-span' => array(
                'begin' => $begin
            )
        );
        $labelStrategy = new LabelStrategy();
        $label = $labelStrategy->hydrate($values);

        $this->assertInstanceOf('\MusicBrainz\Entity\Label', $label);
    }

    /**
     * Test that attempting to hydrate using a non array parameter returns null
     *
     * @covers \MusicBrainz\Hydrator\Strategy\LabelStrategy::hydrate
     */
    public function testHydrateReturnsNull()
    {
        $labelStrategy = new LabelStrategy();

        $this->assertNull($labelStrategy->hydrate(new stdClass()));
    }

}