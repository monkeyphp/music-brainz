<?php
/**
 * ReleaseListTest.php
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

use MusicBrainz\Entity\Count;
use MusicBrainz\Entity\Release;
use MusicBrainz\Entity\ReleaseList;
use PHPUnit_Framework_TestCase;

/**
 * ReleaseListTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class ReleaseListTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can set the Releases
     *
     * @covers \MusicBrainz\Entity\ReleaseList::getReleases
     * @covers \MusicBrainz\Entity\ReleaseList::setReleases
     */
    public function testGetSetReleases()
    {
        $releases = array(
            new Release(),
            new Release(),
        );
        $releaseList = new ReleaseList();

        $this->assertEmpty($releaseList->getReleases());
        $this->assertSame($releaseList, $releaseList->setReleases($releases));
        $this->assertCount(count($releases), $releaseList->getReleases());
    }

    /**
     * Test that we can get and set the Count
     *
     * @covers \MusicBrainz\Entity\ReleaseList::getCount
     * @covers \MusicBrainz\Entity\ReleaseList::setCount
     */
    public function testGetSetCount()
    {
        $releaseList = new ReleaseList();
        $count = new Count(100);

        $this->assertNull($releaseList->getCount());
        $this->assertSame($releaseList, $releaseList->setCount($count));
        $this->assertSame($count, $releaseList->getCount());
    }
}
