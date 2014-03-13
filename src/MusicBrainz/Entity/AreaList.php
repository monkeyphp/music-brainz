<?php
/**
 * AreaList.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 * @author     David White <david@monkeyphp.com>
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
 * AreaList
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 */
class AreaList implements Iterator
{
    /**
     * An array of instances of Area
     *
     * @var array
     */
    protected $areas = array();

    /**
     * Instance of Count
     *
     * @var Count
     */
    protected $count;

    /**
     * Instance of Count
     *
     * @var Count
     */
    protected $offset;

    /**
     * Iterator position
     *
     * @var int
     */
    protected $position = 0;

    /**
     * Set the Areas
     *
     * @param Traversable $areas
     *
     * @return AreaList
     */
    public function setAreas($areas = array())
    {
        if (is_array($areas) || $areas instanceof Traversable) {
            foreach ($areas as $area) {
                if ($area instanceof Area) {
                    $this->addArea($area);
                }
            }
        }
        return $this;
    }

    /**
     * Add an Area to the list
     *
     * @param Area $area The Area to add
     *
     * @return AreaList
     */
    public function addArea(Area $area)
    {
        if (!in_array($area, $this->areas, true)) {
            $this->areas[] = $area;
        }
        return $this;
    }

    /**
     * Return the array of Areas
     *
     * @return array
     */
    public function getAreas()
    {
        return $this->areas;
    }

    public function getCount()
    {
        return $this->count;
    }

    public function getOffset()
    {
        return $this->offset;
    }

    public function setCount(Count $count = null)
    {
        $this->count = $count;
        return $this;
    }

    public function setOffset(Count $offset = null)
    {
        $this->offset = $offset;
        return $this;
    }


    /**
     * Iterator implementation
     *
     * @return Area
     */
    public function current()
    {
        return $this->areas[$this->position];
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
        return isset($this->areas[$this->position]);
    }
}
