<?php

/*
 * Copyright (C) Error: on line 4, column 33 in Templates/Licenses/license-gpl30.txt
  The string doesn't match the expected date/time format. The string to parse was: "22-Feb-2014". The expected format was: "MMM d, yyyy". David White <david@monkeyphp.com>
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
use MusicBrainz\Entity\Count;
/**
 * Description of ReleaseList
 *
 * @author David White <david@monkeyphp.com>
 */
class ReleaseList implements Iterator
{
    /**
     *
     * @var Count
     */
    protected $count;

    /**
     *
     * @var array
     */
    protected $releases = array();

    /**
     *
     * @var int
     */
    protected $position;

    /**
     * Set the Releases
     *
     * @param Traversable $releases
     *
     * @return ReleaseList
     */
    public function setReleases($releases = array())
    {
        if ($releases instanceof Traversable || is_array($releases)) {
            foreach ($releases as $release) {
                if ($release instanceof Release) {
                    $this->addRelease($release);
                }
            }
        }
        return $this;
    }

    /**
     * Add a Release
     *
     * @param Release $release
     *
     * @return ReleaseList
     */
    public function addRelease(Release $release)
    {
        if (! in_array($release, $this->releases, true)) {
            $this->releases[] = $release;
        }
        return $this;
    }

    public function getReleases()
    {
        return $this->releases;
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
        return $this->releases[$this->position];
    }

    public function key()
    {
        // @codeCoverageIgnoreStart
        return $this->position;
        // @codeCoverageIgnoreEnd
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
        return isset($this->releases[$this->position]);
    }
}
