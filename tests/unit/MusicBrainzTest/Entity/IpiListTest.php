<?php
/**
 * IpiListTest.php
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 *
 * Copyright (C) 2014 David White
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

use MusicBrainz\Entity\Ipi;
use MusicBrainz\Entity\IpiList;
use PHPUnit_Framework_TestCase;

/**
 * IpiListTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class IpiListTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can add an Ipi to the list
     *
     * @covers \MusicBrainz\Entity\IpiList::addIpi
     */
    public function testAddIpi()
    {
        $ipiList = new IpiList();
        $ipi = new Ipi('someipi');

        $this->assertEmpty($ipiList->getIpis());
        $this->assertSame($ipiList, $ipiList->addIpi($ipi));
        $this->assertCount(1, $ipiList->getIpis());
    }

    /**
     * Test that we can get and set the Ipis
     *
     * @covers \MusicBrainz\Entity\IpiList::getIpis
     * @covers \MusicBrainz\Entity\IpiList::setIpis
     */
    public function testGetSetIpis()
    {
        $ipiList = new IpiList();
        $ipis = array(
            new Ipi('ipi1')
        );

        $this->assertEmpty($ipiList->getIpis());
        $this->assertSame($ipiList, $ipiList->setIpis($ipis));
        $this->assertCount(count($ipis), $ipiList->getIpis());
    }

    /**
     * Test the iterator implementation
     *
     * @covers \MusicBrainz\Entity\IpiList::current
     * @covers \MusicBrainz\Entity\IpiList::rewind
     * @covers \MusicBrainz\Entity\IpiList::key
     * @covers \MusicBrainz\Entity\IpiList::next
     * @covers \MusicBrainz\Entity\IpiList::valid
     */
    public function testIterator()
    {
        $ipiList = new IpiList();
        $ipis = array(
            new Ipi(1),
            new Ipi(2),
            new Ipi(3),
        );

        $this->assertEmpty($ipiList->getIpis());
        $this->assertSame($ipiList, $ipiList->setIpis($ipis));

        $count = 0;
        foreach ($ipiList as $ipi) {
            $this->assertInstanceOf('\MusicBrainz\Entity\Ipi', $ipi);
            $count++;
        }
        $this->assertCount($count, $ipis);
    }
}
