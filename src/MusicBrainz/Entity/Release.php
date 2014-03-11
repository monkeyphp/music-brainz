<?php
/**
 * Release.php
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
 * Release
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 */
class Release
{
    /**
     * Mbid instance
     *
     * @var Mbid
     */
    protected $mbid;

    /**
     * Title instance
     *
     * @var Title
     */
    protected $title;

    /**
     * Status instance
     *
     * @var Status
     */
    protected $status;

    /**
     * Instance of Packing
     *
     * @var Packaging
     */
    protected $packaging;

    /**
     * Instance of Barcode
     *
     * @var \MusicBrainz\Entity\Barcode
     */
    protected $barcode;

    /**
     * Instance of Quality
     *
     * @var Quality
     */
    protected $quality;

    /**
     * Instance of TextRepresentation
     *
     * @var TextRepresentation
     */
    protected $textRepresentation;

    /**
     * ??
     *
     * @var string
     */
    protected $date;

    /**
     * Instance of Country
     *
     * @var Country
     */
    protected $country;

    /**
     * Instance of ReleaseGroup
     *
     * @var ReleaseGroup
     */
    protected $releaseGroup;

    /**
     * Instance of ReleaseEventList
     *
     * @var ReleaseEventList
     */
    protected $releaseEventList;

    /**
     * Instance of MediumList
     *
     * @var MediumList
     */
    protected $mediumList;

    /**
     * Instance of LabelInfoList
     * 
     * @var LabelInfoList
     */
    protected $labelInfoList;

    /**
     * Return the Mbid instance
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
     * Return the Status
     *
     * @return Status|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Return the Quality instance
     *
     * @return Quality|null
     */
    public function getQuality()
    {
        return $this->quality;
    }

    /**
     * Return the instance of TextRepresentation
     *
     * @return TextRepresentation|null
     */
    public function getTextRepresentation()
    {
        return $this->textRepresentation;
    }

    /**
     *
     * @return string|null
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Return the Country instance
     *
     * @return Country|null
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Return the ReleaseEventList instance
     *
     * @return ReleaseEventList
     */
    public function getReleaseEventList()
    {
        if (! isset($this->releaseEventList)) {
            $this->releaseEventList = new ReleaseEventList();
        }
        return $this->releaseEventList;
    }

    /**
     * Return the MediumList instance
     *
     * @return MediumList
     */
    public function getMediumList()
    {
        if (! isset($this->mediumList)) {
            $this->mediumList = new MediumList();
        }
        return $this->mediumList;
    }

    /**
     * Set the Mbid instance
     *
     * @param Mbid $mbid
     *
     * @return Release
     */
    public function setMbid(Mbid $mbid)
    {
        $this->mbid = $mbid;
        return $this;
    }

    /**
     * Set the Title instance
     *
     * @param Title $title
     *
     * @return Release
     */
    public function setTitle(Title $title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Set the Status instance
     *
     * @param Status $status
     *
     * @return Release
     */
    public function setStatus(Status $status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Set the Quality instance
     *
     * @param Quality $quality
     *
     * @return Release
     */
    public function setQuality(Quality $quality)
    {
        $this->quality = $quality;
        return $this;
    }

    /**
     * Set the TextRepresentation instance
     *
     * @param TextRepresentation $textRepresentation
     *
     * @return Release
     */
    public function setTextRepresentation(TextRepresentation $textRepresentation)
    {
        $this->textRepresentation = $textRepresentation;
        return $this;
    }

    /**
     * Set the date
     *
     * @param string $date
     *
     * @return Release
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Set the Country instance
     *
     * @param Country $country
     *
     * @return Release
     */
    public function setCountry(Country $country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * Set the ReleaseEventList
     *
     * @param ReleaseEventList $releaseEventList
     *
     * @return Release
     */
    public function setReleaseEventList(ReleaseEventList $releaseEventList)
    {
        $this->releaseEventList = $releaseEventList;
        return $this;
    }

    /**
     * Set the MediumList instance
     *
     * @param MediumList $mediumList
     *
     * @return Release
     */
    public function setMediumList(MediumList $mediumList)
    {
        $this->mediumList = $mediumList;
        return $this;
    }

    /**
     * Return the Packaging instance
     *
     * @return Packaging|null
     */
    public function getPackaging()
    {
        return $this->packaging;
    }

    /**
     * Set the Packaging instance
     *
     * @param Packaging $packaging
     *
     * @return Release
     */
    public function setPackaging(Packaging $packaging = null)
    {
        $this->packaging = $packaging;
        return $this;
    }

    /**
     * Return the Barcode instance
     *
     * @return Barcode|null
     */
    public function getBarcode()
    {
        return $this->barcode;
    }

    /**
     * Set the Barcode instance
     *
     * @param Barcode $barcode
     *
     * @return Release
     */
    public function setBarcode(Barcode $barcode = null)
    {
        $this->barcode = $barcode;
        return $this;
    }

    /**
     * Return the ReleaseGroup instance
     *
     * @return ReleaseGroup
     */
    public function getReleaseGroup()
    {
        if (! isset($this->releaseGroup)) {
            $this->releaseGroup = new ReleaseGroup();
        }
        return $this->releaseGroup;
    }

    /**
     * Set the ReleaseGroup
     *
     * @param ReleaseGroup $releaseGroup
     *
     * @return Release
     */
    public function setReleaseGroup(ReleaseGroup $releaseGroup = null)
    {
        $this->releaseGroup = $releaseGroup;
        return $this;
    }
}
