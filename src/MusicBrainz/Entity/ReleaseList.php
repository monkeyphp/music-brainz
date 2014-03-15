<?php
/**
 * ReleaseList.php
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
use MusicBrainz\Entity\Count;
use MusicBrainz\Entity\Release;
use MusicBrainz\Entity\ReleaseList;
use Traversable;

/**
 * ReleaseList
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 */
class ReleaseList implements Iterator
{
    /**
     * Instance of Count
     *
     * @var Count
     */
    protected $count;

    /**
     * Array of instances of Release
     *
     * @var array
     */
    protected $releases = array();

    /**
     * Iterator position
     *
     * @var int
     */
    protected $position;

    /**
     *
     * @var Count|null
     */
    protected $offset;

    /**
     * Set the Releases
     *
     * @param Traversable|array $releases
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

    /**
     * Return the array of Releases
     *
     * @return array
     */
    public function getReleases()
    {
        return $this->releases;
    }

    /**
     * Return the Count
     *
     * @return Count
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Set the Count
     *
     * @param Count $count
     *
     * @return ReleaseList
     */
    public function setCount(Count $count)
    {
        $this->count = $count;
        return $this;
    }

    public function getOffset()
    {
        return $this->offset;
    }

    public function setOffset(Count $offset = null)
    {
        $this->offset = $offset;
        return $this;
    }

    /**
     * Return the current Release
     *
     * @return Release
     */
    public function current()
    {
        return $this->releases[$this->position];
    }

    /**
     * Return the iterator position
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
        return isset($this->releases[$this->position]);
    }
}
