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
     * The Name of the Tag
     *
     * For example: 'metal', 'thrash', 'rock'
     *
     * @var Name|null
     */
    protected $name;

    /**
     * The count of the Tag
     *
     * @var Count|null
     */
    protected $count;

    /**
     * Return the Tag name
     *
     * @return Name|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the Tag name
     *
     * @param Name|null $name
     *
     * @return Tag
     */
    public function setName(Name $name = null)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Return the count
     *
     * @return Count|null
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Set the count
     *
     * @param Count|null $count
     *
     * @return Tag
     */
    public function setCount(Count $count = null)
    {
        $this->count = $count;
        return $this;
    }
}
