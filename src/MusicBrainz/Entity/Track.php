<?php
/**
 * Track.php
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
 * Track
 *
 * @category    MusicBrainz
 * @package     MusicBrainz
 * @subpackage  MusicBrainz\Entity
 */
class Track
{
    /**
     * The Mbid instance
     *
     * @var Mbid
     */
    protected $mbid;

    /**
     * The number of the Track
     *
     * @var Count
     */
    protected $number;

    /**
     * The Title of the Track
     *
     * @var Title
     */
    protected $title;

    /**
     * The Length of the Track
     *
     * @var Length
     */
    protected $length;

    /**
     * Return the Mbid of the Track
     *
     * @return Mbid|null
     */
    public function getMbid()
    {
        return $this->mbid;
    }

    /**
     * Return the number of the Track
     *
     * @return Count|null
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Return the Title of the Track
     *
     * @return Title|null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Return the Length of the Track
     *
     * @return Length|null
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set the Mbid
     *
     * @param Mbid $mbid
     *
     * @return Track
     */
    public function setMbid(Mbid $mbid)
    {
        $this->mbid = $mbid;
        return $this;
    }

    /**
     * Set the number of the Track
     *
     * @param Count $number
     *
     * @return Track
     */
    public function setNumber(Count $number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * Set the Title
     *
     * @param Title $title The Title
     *
     * @return Track
     */
    public function setTitle(Title $title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Set the Length of the Track
     *
     * @param Length $length The Length value
     *
     * @return Track
     */
    public function setLength(Length $length)
    {
        $this->length = $length;
        return $this;
    }
}
