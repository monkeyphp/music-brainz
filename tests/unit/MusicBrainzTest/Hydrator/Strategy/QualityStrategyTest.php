<?php
/**
 * QualityStrategyTest.php
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

use MusicBrainz\Hydrator\Strategy\QualityStrategy;
use PHPUnit_Framework_TestCase;

/**
 * QualityStrategy
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Hydrator\Strategy
 */
class QualityStrategyTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \MusicBrainz\Hydrator\Strategy\QualityStrategy::hydrate
     */
    public function testHydrate()
    {
        $qualityStrategy = new QualityStrategy();

        $quality = $qualityStrategy->hydrate('high');

        $this->assertInstanceOf('\MusicBrainz\Entity\Quality', $quality);
    }
}