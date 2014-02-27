<?php
/**
 * Work.php
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
 * Work
 *
 * @category    MusicBrainz
 * @package     MusicBrainz
 * @subpackage  MusicBrainz\Entity
 */
class Work
{
    /**
     * Instance of Mbid
     *
     * @var Mbid|null
     */
    protected $mbid;

    /**
     * Instance of Title
     *
     * @var Title|null
     */
    protected $title;

    /**
     * Instance of Iswc
     *
     * @var Iswc
     */
    protected $iswc;

    /**
     * Instance of IswcList
     *
     * @var IswcList
     */
    protected $iswcList;

    /**
     * Instance of Disambiguation
     *
     * @var Disambiguation|null
     */
    protected $disambiguation;

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
     * Set the Title instance
     *
     * @return Title|null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Return Iswc instance
     *
     * @return Iswc|null
     */
    public function getIswc()
    {
        return $this->iswc;
    }

    /**
     * Return the IswcList instance
     *
     * @return IswcList
     */
    public function getIswcList()
    {
        if (! isset($this->iswcList)) {
            $this->iswcList = new IswcList();
        }
        return $this->iswcList;
    }

    /**
     * Return the Disambiguation instance
     * 
     * @return Disambiguation|null
     */
    public function getDisambiguation()
    {
        return $this->disambiguation;
    }

    /**
     * Set the Mbid instance
     *
     * @param Mbid $mbid
     *
     * @return Work
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
     * @return Work
     */
    public function setTitle(Title $title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Set the Iswc instance
     *
     * @param \MusicBrainz\Entity\Iswc $iswc
     *
     * @return Work
     */
    public function setIswc(Iswc $iswc)
    {
        $this->iswc = $iswc;
        return $this;
    }

    /**
     * Set the instance of IswcList
     *
     * @param \MusicBrainz\Entity\IswcList $iswcList
     *
     * @return Work
     */
    public function setIswcList(IswcList $iswcList)
    {
        $this->iswcList = $iswcList;
        return $this;
    }

    /**
     * Set the Disambiguation instance
     *
     * @param Disambiguation $disambiguation
     *
     * @return Work
     */
    public function setDisambiguation(Disambiguation $disambiguation)
    {
        $this->disambiguation = $disambiguation;
        return $this;
    }
}
