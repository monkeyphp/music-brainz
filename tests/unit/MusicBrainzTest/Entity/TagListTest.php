<?php
/**
 * TagListTest.php
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

use MusicBrainz\Entity\Tag;
use MusicBrainz\Entity\TagList;
use PHPUnit_Framework_TestCase;

/**
 * TagListTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class TagListTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can set the Tags
     *
     * @covers \MusicBrainz\Entity\TagList::setTags
     */
    public function testSetTags()
    {
        $tags = array(
            new Tag(),
        );
        $tagList = new TagList();

        $this->assertEmpty($tagList->getTags());
        $this->assertSame($tagList, $tagList->setTags($tags));
        $this->assertCount(1, $tagList->getTags());
    }

    /**
     * Test that we can add a Tag to the TagList
     *
     * @covers \MusicBrainz\Entity\Taglist::addTag
     */
    public function testAddTag()
    {
        $tag = new Tag();
        $tagList = new TagList();

        $this->assertEmpty($tagList->getTags());
        $this->assertSame($tagList, $tagList->addTag($tag));
        $this->assertCount(1, $tagList->getTags());
    }

    /**
     * Test that we can get the Tags
     *
     * @covers \MusicBrainz\Entity\TagList::getTags
     */
    public function testGetTags()
    {
        $tagList = new TagList();
        $tags = array(
            new Tag(),
            new Tag(),
        );

        $tagList->setTags($tags);
        $this->assertEquals($tags, $tagList->getTags());
    }

    /**
     * Test the iterator
     *
     * @covers \MusicBrainz\Entity\TagList::current
     * @covers \MusicBrainz\Entity\TagList::key
     * @covers \MusicBrainz\Entity\TagList::next
     * @covers \MusicBrainz\Entity\TagList::rewind
     * @covers \MusicBrainz\Entity\TagList::valid
     */
    public function testIterator()
    {
        $tagList = new TagList();
        $tags = array(
            new Tag(),
            new Tag(),
            new Tag(),
        );

        $tagList->setTags($tags);

        $count = 0;
        foreach ($tagList as $tag) {
            $this->assertInstanceOf('\MusicBrainz\Entity\Tag', $tag);
            $count++;
        }
        $this->assertCount($count, $tags);
    }
}