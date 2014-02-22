<?php
/**
 * Copyright (C)
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
 * Description of Release
 *
 * @author David White <david@monkeyphp.com>
 */
class Release
{
    /**
     *
     * @var Mbid
     */
    protected $mbid;

    /**
     *
     * @var Title
     */
    protected $title;

    /**
     *
     * @var type
     */
    protected $status;

    /**
     *
     * @var type
     */
    protected $quality;

    /**
     *
     * @var type
     */
    protected $textRepresentation;

    protected $date;

    /**
     *
     * @var Country
     */
    protected $country;

    protected $releaseEventList;

    protected $mediumList;

    public function getMbid()
    {
        return $this->mbid;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getQuality()
    {
        return $this->quality;
    }

    public function getTextRepresentation()
    {
        return $this->textRepresentation;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getReleaseEventList()
    {
        return $this->releaseEventList;
    }

    public function getMediumList()
    {
        return $this->mediumList;
    }

    public function setMbid(Mbid $mbid)
    {
        $this->mbid = $mbid;
        return $this;
    }

    public function setTitle(Title $title)
    {
        $this->title = $title;
        return $this;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function setQuality($quality)
    {
        $this->quality = $quality;
        return $this;
    }

    public function setTextRepresentation($textRepresentation)
    {
        $this->textRepresentation = $textRepresentation;
        return $this;
    }

    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    public function setCountry(Country $country)
    {
        $this->country = $country;
        return $this;
    }

    public function setReleaseEventList($releaseEventList)
    {
        $this->releaseEventList = $releaseEventList;
        return $this;
    }

    public function setMediumList($mediumList)
    {
        $this->mediumList = $mediumList;
        return $this;
    }
}
