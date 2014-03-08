<?php
/**
 * ArtistType.php
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
use MusicBrainz\Connector\ConnectorInterface;

/**
 * ArtistType
 *
 * @category    MusicBrainz
 * @package     MusicBrainz
 * @subpackage  MusicBrainz\Entity
 */
class ArtistType
{
    /**
     * An array of valid ArtistType values
     *
     * @var array
     */
    public static $artistTypes = array (
        ConnectorInterface::ARTIST_TYPE_GROUP,
        ConnectorInterface::ARTIST_TYPE_PERSON,
    );

    /**
     * The value of the ArtistType
     *
     * @var string
     */
    protected $artistType;

    /**
     * Constructor
     *
     * @param string $artistType
     *
     * @throws InvalidArgumentException
     * @return void
     */
    public function __construct($artistType)
    {
        if (! is_string($artistType) || ! in_array($artistType, static::$artistTypes)) {
            throw new InvalidArgumentException('Supplied type is invalid');
        }
        $this->artistType = $artistType;
    }

    /**
     * Return a string representation of the ArtistType
     *
     * @return string
     */
    public function __toString()
    {
        return $this->artistType;
    }
}
