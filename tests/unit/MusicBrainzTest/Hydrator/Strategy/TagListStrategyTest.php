<?php
/**
 * TagListStrategyTest.php
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Hydrator\Strategy
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
namespace MusicBrainzTest\Hydrator\Strategy;

use MusicBrainz\Hydrator\Strategy\TagListStrategy;
use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * TagListStrategyTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Hydrator\Strategy
 */
class TagListStrategyTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can hydrate an instance of TagList
     *
     * @covers \MusicBrainz\Hydrator\Strategy\TagListStrategy::hydrate
     */
    public function testHydrate()
    {
        $tagListStrategy = new TagListStrategy();
        $values = array(
            'tag' => array(
                array(
                    'count' => '2',
                    'name' => 'speed metal'
                ),
                array(
                    'count' => '3',
                    'name' => 'rock'
                ),
            )
        );

        $tagList = $tagListStrategy->hydrate($values);

        $this->assertInstanceOf('\MusicBrainz\Entity\TagList', $tagList);
        $this->assertNotEmpty($tagList->getTags());
        foreach ($tagList as $tag) {
            $this->assertInstanceOf('MusicBrainz\Entity\Tag', $tag);
        }
    }

    /**
     * Test that attempting to hydrate with a non array parameter results in
     * null being returned
     *
     * @covers \MusicBrainz\Hydrator\Strategy\TagListStrategy::hydrate
     */
    public function testHydrateReturnsNull()
    {
        $tagListStrategy = new TagListStrategy();

        $this->assertNull($tagListStrategy->hydrate(new stdClass()));
    }
}