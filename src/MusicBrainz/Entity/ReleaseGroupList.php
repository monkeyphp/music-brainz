<?php
/**
 * Copyright (C) Error: on line 4, column 33 in Templates/Licenses/license-gpl30.txt
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
use MusicBrainz\Entity\Count;
use MusicBrainz\Entity\ReleaseGroup;
use MusicBrainz\Entity\ReleaseGroupList;
use Traversable;

/**
 * Description of ReleaseGroupList
 *
 * @author David White <david@monkeyphp.com>
 */
class ReleaseGroupList implements Iterator
{
    /**
     * Instance of Count
     *
     * @var Count|null
     */
    protected $count;

    /**
     * An array containing instances of ReleaseGroup
     *
     * @var array
     */
    protected $releaseGroups = array();

    /**
     * Iterator position
     *
     * @var int
     */
    protected $position = 0;

    /**
     * Set the instances of ReleaseGroup
     *
     * @param Traversable $releaseGroups
     *
     * @return ReleaseGroupList
     */
    public function setReleaseGroups($releaseGroups = array())
    {
        if (is_array($releaseGroups) || $releaseGroups instanceof Traversable) {
            foreach ($releaseGroups as $releaseGroup) {
                if ($releaseGroup instanceof ReleaseGroup) {
                    $this->addReleaseGroup($releaseGroup);
                }
            }
        }
        return $this;
    }

    /**
     * Add an instance of ReleaseGroup to the list
     *
     * @param ReleaseGroup $releaseGroup
     *
     * @return ReleaseGroupList
     */
    public function addReleaseGroup(ReleaseGroup $releaseGroup)
    {
        if (! in_array($releaseGroup, $this->releaseGroups, true)) {
            $this->releaseGroups[] = $releaseGroup;
        }
        return $this;
    }

    /**
     * Return the array of ReleaseGroups
     *
     * @return array
     */
    public function getReleaseGroups()
    {
        return $this->releaseGroups;
    }

    public function getCount()
    {
        return $this->count;
    }

    public function setCount(Count $count)
    {
        $this->count = $count;
        return $this;
    }

    
    public function current()
    {
        return $this->releaseGroups[$this->position];
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        ++$this->position;
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function valid()
    {
        return isset($this->releaseGroups[$this->position]);
    }
}
