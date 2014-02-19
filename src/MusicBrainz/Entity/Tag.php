<?php
/**
 * Tag.php
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

use InvalidArgumentException;

/**
 * Tag
 *
 * @category    MusicBrainz
 * @package     MusicBrainz
 * @subpackage  MusicBrainz\Entity
 * @author      David White <david@monkeyphp.com>
 */
class Tag
{
    /**
     * The name of the Tag
     *
     * For example: 'metal', 'thrash', 'rock'
     *
     * @var string|null
     */
    protected $name;

    /**
     * The count of the Tag
     *
     * @var int|null
     */
    protected $count;

    /**
     * Return the Tag name
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the Tag name
     *
     * @param string|null $name
     *
     * @return Tag
     */
    public function setName($name = null)
    {
        if (! is_null($name) && ! is_string($name)) {
            throw new InvalidArgumentException('Expects a string');
        }
        $this->name = $name;
        return $this;
    }

    /**
     * Return the count
     *
     * @return int|null
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Set the count
     * 
     * @param null|scalar $count
     *
     * @return Tag
     * @throws InvalidArgumentException
     */
    public function setCount($count = null)
    {
        if (! is_null($count) && ! is_numeric($count)) {
            throw new InvalidArgumentException('Expects a numeric');;
        }
        $this->count = (int)$count;
        return $this;
    }
}
