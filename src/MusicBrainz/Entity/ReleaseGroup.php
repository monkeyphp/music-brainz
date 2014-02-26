<?php
/**
 * ReleaseGroup.php
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
 * ReleaseGroup
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 */
class ReleaseGroup
{
    /**
     * Instance of ReleaseGroupType
     *
     * @var ReleaseGroupType
     */
    protected $type;

    /**
     * Instance of Mbid
     *
     * @var Mbid
     */
    protected $mbid;

    /**
     * Instance of Title
     *
     * @var Title
     */
    protected $title;

    /**
     * First release date string
     *
     * @var string
     */
    protected $firstReleaseDate;

    /**
     * Instance of ReleaseGroupType
     *
     * @var ReleaseGroupType
     */
    protected $primaryType;

    /**
     * Instance of SecondaryTypeList
     *
     * @var ReleaseGroupTypeList|null
     */
    protected $secondaryTypeList;

    /**
     * Return the release group type
     *
     * @return ReleaseGroupType|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Return the Mbid
     *
     * @return Mbid|null
     */
    public function getMbid()
    {
        return $this->mbid;
    }

    /**
     * Return the Title instance
     *
     * @return Title|null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     *
     * @return string|null
     */
    public function getFirstReleaseDate()
    {
        return $this->firstReleaseDate;
    }

    /**
     *
     * @return ReleaseGroupType|null
     */
    public function getPrimaryType()
    {
        return $this->primaryType;
    }

    /**
     *
     * @return ReleaseGroupTypeList|null
     */
    public function getSecondaryTypeList()
    {
        return $this->secondaryTypeList;
    }

    /**
     * Set the type of the ReleaseGroup
     *
     * @param ReleaseGroupType $type
     *
     * @return ReleaseGroup
     */
    public function setType(ReleaseGroupType $type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Set the Mbid instance
     *
     * @param Mbid $mbid
     *
     * @return ReleaseGroup
     */
    public function setMbid(Mbid $mbid)
    {
        $this->mbid = $mbid;
        return $this;
    }

    /**
     * Set the Title
     *
     * @param Title $title
     *
     * @return ReleaseGroup
     */
    public function setTitle(Title $title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Set the first release date
     *
     * @param string|null $firstReleaseDate
     *
     * @return ReleaseGroup
     */
    public function setFirstReleaseDate($firstReleaseDate = null)
    {
        $this->firstReleaseDate = $firstReleaseDate;
        return $this;
    }

    /**
     * Set the primary type
     *
     * @param ReleaseGroupType $primaryType
     *
     * @return ReleaseGroup
     */
    public function setPrimaryType(ReleaseGroupType $primaryType = null)
    {
        $this->primaryType = $primaryType;
        return $this;
    }

    /**
     * Set the secondary type list
     *
     * @param ReleaseGroupTypeList $secondaryTypeList
     *
     * @return ReleaseGroup
     */
    public function setSecondaryTypeList(ReleaseGroupTypeList $secondaryTypeList = null)
    {
        $this->secondaryTypeList = $secondaryTypeList;
        return $this;
    }
}