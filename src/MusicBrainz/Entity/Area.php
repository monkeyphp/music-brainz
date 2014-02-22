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

use InvalidArgumentException;

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
     * 1f40c6e1-47ba-4e35-996f-fe6ee5840e62
     *
     * @var string|null
     */
    protected $mbid;

    /**
     * The name of the Area
     *
     * @var string|null
     */
    protected $name;

    /**
     * The sortName value of the Area
     *
     * @var string|null
     */
    protected $sortName;

    /**
     * An instance of Iso31661CodeList
     *
     * @var Iso31661CodeList
     */
    protected $iso31661CodeList;

    /**
     * Return the id
     *
     * @return string|null
     */
    public function getId()
    {
        return $this->mbid;
    }

    /**
     * Set the mbid
     *
     * @param string $id
     *
     * @return Area
     * @throws InvalidArgumentException
     */
    public function setId($id = null)
    {
        if (! is_null($id)) {
            if (! is_string($id) || ! preg_match('#\A[0-9a-f]{8}(?:-[0-9a-f]{4}){3}-[0-9a-f]{12}\z#', $id)) {
                throw new InvalidArgumentException('The supplied id is invalid');
            }
        }
        $this->mbid = $id;
        return $this;
    }

    /**
     * Return the name value of the Area
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the name value of the Area
     *
     * @param string|null $name
     *
     * @throws InvalidArgumentException
     * @return Area
     */
    public function setName($name = null)
    {
        if (! is_null($name) && ! is_string($name)) {
            throw new InvalidArgumentException('Expects a name');
        }
        $this->name = $name;
        return $this;
    }

    /**
     * Set the sortName value
     *
     * @param string|null $sortName
     *
     * @throws InvalidArgumentException
     * @return Area
     */
    public function setSortName($sortName = null)
    {
        if (! is_null($sortName) && ! is_string($sortName)) {
            throw new InvalidArgumentException('Expects a string');
        }
        $this->sortName = $sortName;
        return $this;
    }

    /**
     * Return the sortName value of the Area
     *
     * @return string|null
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
