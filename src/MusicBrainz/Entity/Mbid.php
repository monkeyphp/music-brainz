<?php
/**
 * Mbid.php
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

use InvalidArgumentException;

/**
 * Mbid
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 */
class Mbid
{
    /**
     * The value of the Mbid
     *
     * @var string
     */
    protected $mbid;

    /**
     * Constructor
     *
     * @param string $mbid
     *
     * @throws InvalidArgumentException
     * @return void
     */
    public function __construct($mbid)
    {
        if (! preg_match('#\A[0-9a-f]{8}(?:-[0-9a-f]{4}){3}-[0-9a-f]{12}\z#', $mbid)) {
            throw new InvalidArgumentException('The supplied id is invalid');
        }
        $this->mbid = $mbid;
    }

    /**
     * Return a string representation of the Mbid
     *
     * @return string
     */
    public function __toString()
    {
        return $this->mbid;
    }
}
