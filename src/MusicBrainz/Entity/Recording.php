<?php
/**
 * Copyright (C) David White
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
 * Description of Recording
 *
 * @author David White <david@monkeyphp.com>
 */
class Recording
{
    /**
     *
     * 030b65aa-feb5-4269-ab59-5b250a478f1a
     *
     * @var string|null
     */
    protected $mbid;

    /**
     * ...and Justice for All
     *
     * @var string|null
     */
    protected $title;

    /**
     * The length of the recording
     *
     * 180000
     *
     * @var int|null
     */
    protected $length;

    /**
     *
     * live, 1988-10-21: Rudi-Sedlmayer-Halle. Munich, Germany
     *
     * @var string|null
     */
    protected $disambiguation;

    public function getMbid()
    {
        return $this->mbid;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function getDisambiguation()
    {
        return $this->disambiguation;
    }

    public function setMbid($mbid)
    {
        $this->mbid = $mbid;
        return $this;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function setLength($length)
    {
        $this->length = $length;
        return $this;
    }

    public function setDisambiguation($disambiguation)
    {
        $this->disambiguation = $disambiguation;
        return $this;
    }
}
