<?php
/**
 * WorkStrategyTest.php
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

use PHPUnit_Framework_TestCase;

/**
 * WorkStrategy
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Hydrator\Strategy
 */
class WorkStrategyTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can hydrate an instance of Work
     *
     * @covers \MusicBrainz\Hydrator\Strategy\WorkStrategy::hydrate
     */
    public function testHydrate()
    {
        $workStrategy = new \MusicBrainz\Hydrator\Strategy\WorkStrategy();
        $values = array(
            'id' => '5ccad98a-9e2d-369c-b60c-48ee186d93ab',
            'title' => 'Human',
            'iswc' => 'T-070.899.612-6',
            'iswc-list' => array(),
            'disambiguation' => 'S&amp;M version'
        );

        $work = $workStrategy->hydrate($values);

        $this->assertInstanceOf('\MusicBrainz\Entity\Work', $work);
    }

    /**
     * @covers \MusicBrainz\Hydrator\Strategy\WorkStrategy::hydrate
     */
    public function testhydrateReturnsNull()
    {
        $workStrategy = new \MusicBrainz\Hydrator\Strategy\WorkStrategy();

        $this->assertNull($workStrategy->hydrate(new \stdClass()));
    }

    /**
     * @covers \MusicBrainz\Hydrator\Strategy\WorkStrategy::extract
     */
    public function testExtract()
    {
        $this->markTestIncomplete();
    }

    /**
     * @covers \MusicBrainz\Hydrator\Strategy\WorkStrategy::extract
     */
    public function testExtractReturnsNull()
    {
        $this->markTestIncomplete();
    }
}