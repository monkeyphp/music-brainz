<?php
/**
 * LabelInfoListTest.php
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 *
 * Copyright (C) David White
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
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
namespace MusicBrainzTest\Entity;

use MusicBrainz\Entity\LabelInfo;
use MusicBrainz\Entity\LabelInfoList;
use PHPUnit_Framework_TestCase;

/**
 * LabelInfoListTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class LabelInfoListTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can get and set the LabelInfos
     *
     * @covers \MusicBrainz\Entity\LabelInfoList::getLabelInfos
     * @covers \MusicBrainz\Entity\LabelInfoList::setLabelInfos
     */
    public function testSetLabelInfos()
    {
        $labelInfoList = new LabelInfoList();
        $labelInfos = array(
            new LabelInfo()
        );

        $this->assertEmpty($labelInfoList->getLabelInfos());
        $this->assertSame($labelInfoList, $labelInfoList->setLabelInfos($labelInfos));
        $this->assertNotEmpty($labelInfoList->getLabelInfos());
    }

    /**
     * Test that we can add a LabelInfo
     *
     * @covers \MusicBrainz\Entity\LabelInfoList::addLabelInfo
     */
    public function testAddLabelInfo()
    {
        $labelInfoList = new LabelInfoList();
        $labelInfo = new LabelInfo();

        $this->assertEmpty($labelInfoList->getLabelInfos());
        $this->assertSame($labelInfoList, $labelInfoList->addLabelInfo($labelInfo));
        $this->assertNotEmpty($labelInfoList->getLabelInfos());
    }

    /**
     * Test the Iterator implementation
     *
     * @covers \MusicBrainz\Entity\LabelInfoList::current
     * @covers \MusicBrainz\Entity\LabelInfoList::rewind
     * @covers \MusicBrainz\Entity\LabelInfoList::key
     * @covers \MusicBrainz\Entity\LabelInfoList::valid
     * @covers \MusicBrainz\Entity\LabelInfoList::next
     */
    public function testIterator()
    {
        $labelInfoList = new LabelInfoList();
        $labelInfos = array(
            new LabelInfo(),
            new LabelInfo()
        );

        $count = 0;
        $labelInfoList->setLabelInfos($labelInfos);

        foreach ($labelInfoList as $labelInfo) {
            $this->assertInstanceOf('\MusicBrainz\Entity\LabelInfo', $labelInfo);
            $count++;
        }

        $this->assertCount($count, $labelInfos);
    }
}
