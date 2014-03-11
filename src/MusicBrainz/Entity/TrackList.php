<?php
/**
 * TrackList.php
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

/**
 * TrackList
 *
 * @category    MusicBrainz
 * @package     MusicBrainz
 * @subpackage  MusicBrainz\Entity
 */
class TrackList
{
    /**
     * The array of Tracks
     *
     * @var array
     */
    protected $tracks = array();

    /**
     * The Count of the TrackList
     *
     * @var Count
     */
    protected $count;

    /**
     * The offset of the TrackList
     *
     * @var Count
     */
    protected $offset;

    public function setTracks($tracks = array())
    {
        if (is_array($tracks) || $tracks instanceof \Traversable) {
            foreach ($tracks as $track) {
                if ($track instanceof Track) {
                    $this->addTrack($track);
                }
            }
        }
        return $this;
    }

    public function addTrack(Track $track)
    {
        if (! in_array($track, $this->tracks, true)) {
            $this->tracks[] = $track;
        }
        return $this;
    }

    public function getTracks()
    {
        return $this->tracks;
    }

    public function getCount()
    {
        return $this->count;
    }

    public function getOffset()
    {
        return $this->offset;
    }

    public function setCount(Count $count)
    {
        $this->count = $count;
        return $this;
    }

    public function setOffset(Count $offset)
    {
        $this->offset = $offset;
        return $this;
    }
}
