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

use Zend\Validator\Exception\InvalidArgumentException;

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

    protected $name;

    protected $sortName;

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
     * @return Area
     */
    public function setName($name = null)
    {
        $this->name = $name;
        return $this;
    }

    public function setSortName($sortName)
    {
        $this->sortName = $sortName;
        return $this;
    }

    public function getSortName()
    {
        return $this->sortName;
    }

}
