<?php
/**
 * RecordingTest.php
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

use PHPUnit_Framework_TestCase;

/**
 * RecordingTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class RecordingTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can get and set the Mbid
     *
     * @covers \MusicBrainz\Entity\Recording::getMbid
     * @covers \MusicBrainz\Entity\Recording::setMbid
     */
    public function testGetSetMbid()
    {
        $recording = new \MusicBrainz\Entity\Recording();
        $string = '930246f5-a2c8-4499-971c-5b6d84d5d0df';
        $mbid = new \MusicBrainz\Entity\Mbid($string);

        $this->assertNull($recording->getMbid());
        $this->assertSame($recording, $recording->setMbid($mbid));
        $this->assertSame($mbid, $recording->getMbid());
    }
}
