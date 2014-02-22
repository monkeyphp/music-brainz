<?php
/**
 * TagTest.php
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
use MusicBrainz\Entity\Name;
use MusicBrainz\Entity\Tag;
use PHPUnit_Framework_TestCase;


/**
 * TagTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 */
class TagTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can get and set the name
     *
     * @covers \MusicBrainz\Entity\Tag::getName
     * @covers \MusicBrainz\Entity\Tag::setName
     */
    public function testGetSetName()
    {
        $tag = new Tag();
        $name = new Name('metal');

        $this->assertNull($tag->getName());
        $this->assertSame($tag, $tag->setName($name));
        $this->assertSame($name, $tag->getName());
    }

    /**
     * Test that we can get and set the count
     *
     * @covers \MusicBrainz\Entity\Tag::getCount
     * @covers \MusicBrainz\Entity\Tag::setCount
     */
    public function testSetGetCount()
    {
        $tag = new Tag();
        $count = new Count(1);

        $this->assertNull($tag->getCount());
        $this->assertSame($tag, $tag->setCount($count));
        $this->assertSame($count, $tag->getCount());
    }
}