<?php
/**
 * TagList.php
 *
 * @category    MusicBrainz
 * @package     MusicBrainz
 * @subpackage  MusicBrainz\Entity
 * @author      David White <david@monkeyphp.com>
 *
 * Copyright (C) David White <david@monkeyphp.com>
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
namespace MusicBrainz\Entity;

use Iterator;
use Traversable;

/**
 * TagList
 *
 * @category    MusicBrainz
 * @package     MusicBrainz
 * @subpackage  MusicBrainz\Entity
 */
class TagList implements Iterator
{
    /**
     * The array of Tags
     *
     * @var array
     */
    protected $tags = array();

    /**
     * The current position of the Iterator
     *
     * @var int
     */
    protected $position = 0;

    /**
     * Set the tags
     *
     * @param Traversable|array $tags
     *
     * @return TagList
     */
    public function setTags($tags = array())
    {
        if (is_array($tags) || ($tags instanceof Traversable)) {
            foreach ($tags as $tag) {
                if ($tag instanceof Tag) {
                    $this->addTag($tag);
                }
            }
        }
        return $this;
    }

    /**
     * Add a Tag instance to the tags array
     *
     * @param Tag $tag The Tag to add
     *
     * @return TagList
     */
    public function addTag(Tag $tag)
    {
        if (! in_array($tag, $this->tags, true)) {
            $this->tags[] = $tag;
        }
        return $this;
    }

    /**
     * Return the tags array
     *
     * @return array
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Iterator implementation
     *
     * @return Tag
     */
    public function current()
    {
        return $this->tags[$this->position];
    }

    /**
     * Iterator implementation
     *
     * @return int
     */
    public function key()
    {
        // @codeCoverageIgnoreStart
        return $this->position;
        // @codeCoverageIgnoreEnd
    }

    /**
     * Iterator implementation
     *
     * @return void
     */
    public function next()
    {
        ++$this->position;
    }

    /**
     * Iterator implementation
     *
     * @return void
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * Iterator implementation
     *
     * @return boolean
     */
    public function valid()
    {
        return isset($this->tags[$this->position]);
    }
}
