<?php
/**
 * LabelListStrategyTest.php
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

use MusicBrainz\Entity\Label;
use MusicBrainz\Entity\LabelList;
use MusicBrainz\Entity\Name;
use MusicBrainz\Hydrator\Strategy\LabelListStrategy;
use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * LabelListStrategyTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Hydrator\Strategy
 */
class LabelListStrategyTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can hydrate the LabelList
     *
     * @covers \MusicBrainz\Hydrator\Strategy\LabelListStrategy::hydrate
     */
    public function testHydrate()
    {
        $labelListStrategy = new LabelListStrategy();

        $count = 12;
        $offset = 0;
        $values = array(
            'label' => array(
                array(
                    'name' => 'Decca Records',
                    'sort-name' => 'Decca Records'
                ),
            ),
            'count' => $count,
            'offset' => $offset
        );

        $labelList = $labelListStrategy->hydrate($values);

        $this->assertInstanceOf('\MusicBrainz\Entity\LabelList', $labelList);

        $this->assertEquals($count, $labelList->getCount()->__toString());
        $this->assertEquals($offset, $labelList->getOffset()->__toString());
    }

    /**
     * Test that attempting to hydrate using a non array value returns null
     *
     * @covers \MusicBrainz\Hydrator\Strategy\LabelListStrategy::hydrate
     */
    public function testHydrateReturnsNull()
    {
        $labelListStrategy = new LabelListStrategy();

        $this->assertNull($labelListStrategy->hydrate(new stdClass()));
    }

    /**
     * Test that we can extract the values from the supplied LabelList instance
     *
     * @covers \MusicBrainz\Hydrator\Strategy\LabelListStrategy::extract
     */
    public function testExtract()
    {
        $labelListStrategy = new LabelListStrategy();
        $labelList = new LabelList();
        $label = new Label();
        $label->setName(new Name('Decca Records'));
        $labelList->addLabel($label);

        $extracted = $labelListStrategy->extract($labelList);

        $this->assertInternalType('array', $extracted);
        $this->assertArrayHasKey('label', $extracted);
    }

    /**
     * Test that passing an invalid parameter returns null
     *
     * @covers \MusicBrainz\Hydrator\Strategy\LabelListStrategy::extract
     */
    public function testExtractReturnsNull()
    {
        $labelListStrategy = new LabelListStrategy();

        $this->assertNull($labelListStrategy->extract(new stdClass()));
    }
}