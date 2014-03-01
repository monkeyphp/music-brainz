<?php
/**
 * Area.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 *
 * Copyright (C) 2014  David White
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
 * along with this program.  If not, see [http://www.gnu.org/licenses/].
 */
namespace MusicBrainz\Entity;

/**
 * Area
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 */
class Area
{
    /**
     * The mbid value of the Area
     *
     * @var Mbid|null
     */
    protected $mbid;

    /**
     * Instance of AreaType
     *
     * @var AreaType|null
     */
    protected $type;

    /**
     * Instance of Score
     *
     * @var Score|null
     */
    protected $score;

    /**
     * The name of the Area
     *
     * @var Name|null
     */
    protected $name;

    /**
     * The sortName value of the Area
     *
     * @var Name|null
     */
    protected $sortName;

    /**
     * An instance of Iso31661CodeList
     *
     * @var Iso31661CodeList
     */
    protected $iso31661CodeList;

    /**
     * Instance of LifeSpan
     *
     * @var LifeSpan
     */
    protected $lifeSpan;

    /**
     * Instance of AliasList
     * 
     * @var AliasList
     */
    protected $aliasList;

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
     * Set the Mbid
     *
     * @param Mbid $mbid
     *
     * @return Area
     */
    public function setMbid($mbid = null)
    {
        $this->mbid = $mbid;
        return $this;
    }

    /**
     * Return the name value of the Area
     *
     * @return Name|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the name value of the Area
     *
     * @param Name|null $name
     *
     * @return Area
     */
    public function setName($name = null)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Set the sortName value
     *
     * @param Name|null $sortName
     *
     * @return Area
     */
    public function setSortName($sortName = null)
    {
        $this->sortName = $sortName;
        return $this;
    }

    /**
     * Return the sortName value of the Area
     *
     * @return Name|null
     */
    public function getSortName()
    {
        return $this->sortName;
    }

    /**
     * Return the instance of Iso31661CodeList
     *
     * If the iso31661CodeList has not already been set, this method will
     * create a new instance and set this instance property
     *
     * @return Iso31661CodeList
     */
    public function getIso31661CodeList()
    {
        if (! isset($this->iso31661CodeList)) {
            $this->iso31661CodeList = new Iso31661CodeList();
        }
        return $this->iso31661CodeList;
    }

    /**
     * Set the Iso31661CodeList instance
     *
     * @param Iso31661CodeList $iso31661CodeList
     *
     * @return Area
     */
    public function setIso31661CodeList(Iso31661CodeList $iso31661CodeList = null)
    {
        $this->iso31661CodeList = $iso31661CodeList;
        return $this;
    }
}
