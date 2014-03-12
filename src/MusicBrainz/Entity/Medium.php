<?php
/**
 * Medium.php
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

/**
 * Medium
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 */
class Medium
{
    /**
     *
     * @var Count
     */
    protected $position;

    /**
     *
     * @var Format
     */
    protected $format;

    /**
     *
     * @var TrackList
     */
    protected $trackList;

    public function getPosition()
    {
        return $this->position;
    }

    public function getFormat()
    {
        return $this->format;
    }

    public function getTrackList()
    {
        return $this->trackList;
    }

    public function setPosition(Count $position)
    {
        $this->position = $position;
        return $this;
    }

    public function setFormat(Format $format)
    {
        $this->format = $format;
        return $this;
    }

    public function setTrackList(TrackList $trackList)
    {
        $this->trackList = $trackList;
        return $this;
    }
}
