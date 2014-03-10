<?php
/**
 * LabelListTest.php
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

use MusicBrainz\Entity\Count;
use MusicBrainz\Entity\Label;
use MusicBrainz\Entity\LabelList;
use PHPUnit_Framework_TestCase;

/**
 * LabelListTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class LabelListTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can get and set the Count
     *
     * @covers \MusicBrainz\Entity\LabelList::getCount
     * @covers \MusicBrainz\Entity\LabelList::setCount
     */
    public function testGetSetCount()
    {
        $labelList = new LabelList();
        $count = new Count(3);

        $this->assertNull($labelList->getCount());
        $this->assertSame($labelList, $labelList->setCount($count));
        $this->assertSame($count, $labelList->getCount());
    }

    /**
     * Test that we can get and set the offset
     *
     * @covers \MusicBrainz\Entity\LabelList::getOffset
     * @covers \MusicBrainz\Entity\LabelList::setOffset
     */
    public function testGetSetOffset()
    {
        $labelList = new LabelList();
        $offset = new Count(1);

        $this->assertNull($labelList->getOffset());
        $this->assertSame($labelList, $labelList->setOffset($offset));
        $this->assertSame($offset, $labelList->getOffset());
    }

    /**
     * Test that we can get and set the Labels
     *
     * @covers \MusicBrainz\Entity\LabelList::getLabels
     * @covers \MusicBrainz\Entity\LabelList::setLabels
     */
    public function testGetSetLabels()
    {
        $labelList = new LabelList();
        $labels = array(
            new Label(),
            new Label(),
            new Label()
        );

        $this->assertEmpty($labelList->getLabels());
        $this->assertSame($labelList, $labelList->setLabels($labels));
        $this->assertCount(count($labels), $labelList->getLabels());
    }

    /**
     * Test that we can add a Label
     *
     * @covers \MusicBrainz\Entity\LabelList::addLabel
     */
    public function testAddLabel()
    {
        $labelList = new LabelList();
        $label = new Label();

        $this->assertEmpty($labelList->getLabels());
        $this->assertSame($labelList, $labelList->addLabel($label));
        $this->assertCount(1, $labelList->getLabels());
    }

    /**
     * Test the iterator
     *
     * @covers \MusicBrainz\Entity\LabelList::current
     * @covers \MusicBrainz\Entity\LabelList::key
     * @covers \MusicBrainz\Entity\LabelList::next
     * @covers \MusicBrainz\Entity\LabelList::rewind
     * @covers \MusicBrainz\Entity\LabelList::valid
     */
    public function testIterator()
    {
        $labelList = new LabelList();
        $labels = array(
            new Label(),
            new Label()
        );
        $this->assertEmpty($labelList->getLabels());
        $this->assertSame($labelList, $labelList->setLabels($labels));
        $count = 0;
        foreach ($labelList as $label) {
            $this->assertInstanceOf('\MusicBrainz\Entity\Label', $label);
            $count++;
        }
        $this->assertCount($count, $labels);
    }
}