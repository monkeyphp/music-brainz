<?php
/**
 * LifeSpanTest.php
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
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
namespace MusicBrainzTest\Entity;

use MusicBrainz\Entity\LifeSpan;
use PHPUnit_Framework_TestCase;

/**
 * LifeSpanTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 */
class LifeSpanTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can get and set the ended value
     *
     * @covers \MusicBrainz\Entity\LifeSpan::getEnded
     * @covers \MusicBrainz\Entity\LifeSpan::setEnded
     */
    public function testGetSetEnded()
    {
        $lifeSpan = new LifeSpan();
        $ended = false;

        $this->assertNull($lifeSpan->getEnded());
        $this->assertSame($lifeSpan, $lifeSpan->setEnded($ended));
        $this->assertEquals($lifeSpan->getEnded(), $ended);
    }
}