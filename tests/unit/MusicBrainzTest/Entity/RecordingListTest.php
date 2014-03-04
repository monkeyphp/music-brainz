<?php
/**
 * RecordingListTest.php
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

use MusicBrainz\Entity\Recording;
use MusicBrainz\Entity\RecordingList;
use PHPUnit_Framework_TestCase;

/**
 * RecordingListTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 *
 */
class RecordingListTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can set the Recordings
     *
     * @covers \MusicBrainz\Entity\RecordingList::getRecordings
     * @covers \MusicBrainz\Entity\RecordingList::setRecordings
     */
    public function testGetSetRecordings()
    {
        $recordingList = new RecordingList();
        $recordings = array(
            new Recording(),
        );

        $this->assertEmpty($recordingList->getRecordings());
        $this->assertSame($recordingList, $recordingList->setRecordings($recordings));
        $this->assertCount(count($recordings), $recordingList->getRecordings());
    }

    /**
     * Test that we can add a Recording
     *
     * @covers \MusicBrainz\Entity\RecordingList::addRecording
     */
    public function testAddRecording()
    {
        $recordingList = new RecordingList();
        $recording = new Recording();

        $this->assertEmpty($recordingList->getRecordings());
        $this->assertSame($recordingList, $recordingList->addRecording($recording));
        $this->assertNotEmpty($recordingList->getRecordings());
    }

    /**
     * Test the iterator implementation
     *
     * @covers \MusicBrainz\Entity\RecordingList::current
     * @covers \MusicBrainz\Entity\RecordingList::rewind
     * @covers \MusicBrainz\Entity\RecordingList::next
     * @covers \MusicBrainz\Entity\RecordingList::valid
     * @covers \MusicBrainz\Entity\RecordingList::key
     */
    public function testIterator()
    {
        $recordingList = new RecordingList();
        $recordings = array(
            new Recording(),
            new Recording(),
            new Recording()
        );

        $this->assertEmpty($recordingList->getRecordings());
        $this->assertSame($recordingList, $recordingList->setRecordings($recordings));

        $count = 0;
        foreach ($recordingList as $recording) {
            $this->assertInstanceOf('\MusicBrainz\Entity\Recording', $recording);
            $count++;
        }

        $this->assertCount($count, $recordings);
    }
}
