<?php
/**
 * ReleaseEventList.php
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
use Traversable;

/**
 * ReleaseEventList
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 */
class ReleaseEventList implements Iterator
{
    /**
     * Instance of Count
     *
     * @var Count
     */
    protected $count;

    /**
     * An array containing ReleaseEvent instances
     *
     * @var array
     */
    protected $releaseEvents = array();

    /**
     * Iterator position
     *
     * @var int
     */
    protected $position = 0;

    /**
     * Set the ReleaseEvents
     *
     * @param Traversable $releaseEvents
     *
     * @return ReleaseEventList
     */
    public function setReleaseEvents($releaseEvents = array())
    {
        if (is_array($releaseEvents) || $releaseEvents instanceof Traversable) {
            foreach ($releaseEvents as $releaseEvent) {
                if ($releaseEvent instanceof ReleaseEvent) {
                    $this->addReleaseEvent($releaseEvent);
                }
            }
        }
        return $this;
    }

    /**
     * Add a ReleaseEvent instance
     *
     * @param ReleaseEvent $releaseEvent
     *
     * @return ReleaseEventList
     */
    public function addReleaseEvent(ReleaseEvent $releaseEvent)
    {
        if (! in_array($releaseEvent, $this->releaseEvents, true)) {
            $this->releaseEvents[] = $releaseEvent;
        }
        return $this;
    }

    /**
     * Return the array of ReleaseEvents
     *
     * @return array
     */
    public function getReleaseEvents()
    {
        return $this->releaseEvents;
    }

    /**
     * Return the current ReleaseEvent
     *
     * @return ReleaseEvent
     */
    public function current()
    {
        return $this->releaseEvents[$this->position];
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
        return isset($this->releaseEvents[$this->position]);
    }
}
