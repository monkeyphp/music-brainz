<?php
/**
 * Ipi.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 * @author     David White <david@monkeyphp.com>
 *
 * Copyright (C) David White
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
 * Ipi
 *
 * A class representing the Interested Parties Information
 *
 * @link http://en.wikipedia.org/wiki/Interested_Parties_Information
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 */
class Ipi
{
    /**
     * The value of the Ipi
     *
     * @var string
     */
    protected $ipi;

    /**
     * Constructor
     *
     * @param string $ipi
     *
     * @return void
     */
    public function __construct($ipi)
    {
        $this->ipi = $ipi;
    }

    /**
     * Return a string representation of the Ipi
     *
     * @return string
     */
    public function __toString()
    {
        return $this->ipi;
    }
}
