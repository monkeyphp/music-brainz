<?php
/**
 * Recording.php
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

/**
 * Recording
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 */
class Recording
{
    /**
     * The Mbid of the Recording
     *
     * @var Mbid|null
     */
    protected $mbid;

    /**
     * The Title of the Recording
     *
     * @var Title|null
     */
    protected $title;

    /**
     * The Length of the recording
     *
     * @var Length|null
     */
    protected $length;

    /**
     * The Disambiguation of the Recording
     *
     * @var Disambiguation|null
     */
    protected $disambiguation;

    /**
     * Return the Mbid value
     *
     * @return Mbid|null
     */
    public function getMbid()
    {
        return $this->mbid;
    }

    /**
     * Return the Title value
     *
     * @return Title|null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Return the Length value
     *
     * @return Length|null
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Return the Disambiguation value
     *
     * @return Disambiguation|null
     */
    public function getDisambiguation()
    {
        return $this->disambiguation;
    }

    /**
     * Set the Mbid value
     *
     * @param Mbid $mbid
     *
     * @return Recording
     */
    public function setMbid(Mbid $mbid)
    {
        $this->mbid = $mbid;
        return $this;
    }

    /**
     * Set the Title of the Recording
     *
     * @param Title $title
     *
     * @return Recording
     */
    public function setTitle(Title $title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Set the Length
     *
     * @param Length $length
     *
     * @return Recording
     */
    public function setLength(Length $length)
    {
        $this->length = $length;
        return $this;
    }

    /**
     * Set the Disambiguation value
     *
     * @param Disambiguation $disambiguation
     *
     * @return Recording
     */
    public function setDisambiguation(Disambiguation $disambiguation)
    {
        $this->disambiguation = $disambiguation;
        return $this;
    }
}
