<?php
/**
 * Ended.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 * @author     David White [monkeyphp] <david@monkeyphp.com>
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
 * Ended
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 */
class Ended
{
    /**
     * The value of the Ended
     *
     * @var booleab
     */
    protected $ended;

    /**
     * Constructor
     *
     * @param mixed $ended
     *
     * @return void
     */
    public function __construct($ended)
    {
        if (is_string($ended) && (in_array(strtolower($ended), array('true', 'false')))) {
            $ended = ($ended === 'true') ? true : false;
        }
        $this->ended = (bool)$ended;
    }

    /**
     * Return a string representation of the Ended
     * 
     * @return string
     */
    public function __toString()
    {
        return ($this->ended) ? 'true' : 'false';
    }
}
