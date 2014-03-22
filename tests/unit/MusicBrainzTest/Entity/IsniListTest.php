<?php
/**
 * IsniListTest.php
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

use MusicBrainz\Entity\Isni;
use MusicBrainz\Entity\IsniList;
use PHPUnit_Framework_TestCase;

/**
 * IsniListTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class IsniListTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can add an Isni instance
     *
     * @covers \MusicBrainz\Entity\IsniList::addIsni
     */
    public function testAddIsni()
    {
        $isniList = new IsniList();
        $isni = new Isni(0000000122939631);

        $this->assertEmpty($isniList->getIsnis());
        $this->assertSame($isniList, $isniList->addIsni($isni));
        $this->assertCount(1, $isniList->getIsnis());
    }

    /**
     * Test that we can get and set the Isnis
     *
     * @covers \MusicBrainz\Entity\IsniList::getIsnis
     * @covers \MusicBrainz\Entity\IsniList::setIsnis
     */
    public function testGetSetIsnis()
    {
        $isniList = new IsniList();
        $isnis = array(
            new Isni(0000000122939631),
            new Isni(0000000122939632),
        );

        $this->assertEmpty($isniList->getIsnis());
        $this->assertSame($isniList, $isniList->setIsnis($isnis));
        $this->assertCount(count($isnis), $isniList->getIsnis());
    }

    /**
     * Test the Iterator
     *
     * @covers \MusicBrainz\Entity\IsniList::rewind
     * @covers \MusicBrainz\Entity\IsniList::next
     * @covers \MusicBrainz\Entity\IsniList::key
     * @covers \MusicBrainz\Entity\IsniList::current
     * @covers \MusicBrainz\Entity\IsniList::valid
     */
    public function testIterator()
    {
        $isniList = new IsniList();
        $isnis = array(
            new Isni(0000000122939631),
            new Isni(0000000122939632),
        );
        $isniList->setIsnis($isnis);
        
        $count = 0;

        foreach ($isniList as $isni) {
            $this->assertInstanceOf('\MusicBrainz\Entity\Isni', $isni);
            $count++;
        }

        $this->assertCount($count, $isnis);
    }
}