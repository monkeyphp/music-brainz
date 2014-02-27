<?php
/**
 * WorkTest.php
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

use MusicBrainz\Entity\Mbid;
use MusicBrainz\Entity\Work;
use PHPUnit_Framework_TestCase;

/**
 * WorkTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class WorkTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can get and set the Mbid
     *
     * @covers \MusicBrainz\Entity\Work::getMbid
     * @covers \MusicBrainz\Entity\Work::setMbid
     */
    public function testGetSetMbid()
    {
        $work = new Work();
        $mbid = new Mbid('72ee2329-bdb0-392e-9c5b-bfdf6f9b82c4');

        $this->assertNull($work->getMbid());
        $this->assertSame($work, $work->setMbid($mbid));
        $this->assertSame($mbid, $work->getMbid());
    }
}