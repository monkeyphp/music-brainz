<?php
/**
 * RecordingList.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 * @author     David white <david@monkeyphp.com>
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
 * RecordingList
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 */
class RecordingList implements Iterator
{
    /**
     *
     * @var Count|null
     */
    protected $count;

    /**
     * An array of Recording instances
     *
     * @var array
     */
    protected $recordings = array();

    /**
     * Iterator position
     *
     * @var int
     */
    protected $position = 0;

    /**
     * Set the Recordings
     *
     * @param Traversable $recordings
     *
     * @return RecordingList
     */
    public function setRecordings($recordings = array())
    {
        if (is_array($recordings) || $recordings instanceof Traversable) {
            foreach ($recordings as $recording) {
                if ($recording instanceof Recording) {
                    $this->addRecording($recording);
                }
            }
        }
        return $this;
    }

    /**
     * Return the Recordings array
     *
     * @return array
     */
    public function getRecordings()
    {
        return $this->recordings;
    }

    /**
     * Add a Recording to the list
     *
     * @param Recording $recording
     *
     * @return RecordingList
     */
    public function addRecording(Recording $recording)
    {
        if (! in_array($recording, $this->recordings, true)) {
            $this->recordings[] = $recording;
        }
        return $this;
    }

    public function getCount()
    {
        return $this->count;
    }

    public function setCount(Count $count = null)
    {
        $this->count = $count;
        return $this;
    }


    /**
     * Return the current Recording
     *
     * @return Recording
     */
    public function current()
    {
        return $this->recordings[$this->position];
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
        return isset($this->recordings[$this->position]);
    }
}
