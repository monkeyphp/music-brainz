<?php
/**
 * ReleaseEvent.php
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
 * ReleaseEvent
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 */
class ReleaseEvent
{
    /**
     *
     * @var string
     */
    protected $date;

    /**
     * Instance of Area
     *
     * @var Area
     */
    protected $area;

    /**
     * Return the date
     * 
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Return the Area
     *
     * @return Area|null
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set the date instance
     *
     * @param string $date
     *
     * @return ReleaseEvent
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Set the Area instance
     *
     * @param Area $area
     *
     * @return ReleaseEvent
     */
    public function setArea(Area $area)
    {
        $this->area = $area;
        return $this;
    }
}

