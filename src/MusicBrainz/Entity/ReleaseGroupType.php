<?php
/**
 * ReleaseGroupType.php
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
use MusicBrainz\Connector\ConnectorInterface;

/**
 * ReleaseGroupType
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 */
class ReleaseGroupType
{
    /**
     * The value of the ReleaseGroupType
     *
     * @var string
     */
    protected $releaseGroupType;

    /**
     * An array of valid release group types
     *
     * @var array
     */
    public static $releaseGroupTypes = array(
        ConnectorInterface::RELEASE_GROUP_TYPE_ALBUM,
        ConnectorInterface::RELEASE_GROUP_TYPE_COMPILATION
    );

    /**
     * Constructor
     * 
     * @param string $releaseGroupType
     *
     * @throws InvalidArgumentException
     * @return void
     */
    public function __construct($releaseGroupType)
    {
        if (! in_array($releaseGroupType, static::$releaseGroupTypes)) {
            throw new InvalidArgumentException('Invalid type supplied');
        }
        $this->releaseGroupType = $releaseGroupType;
    }

    /**
     * Return a string representation of the ReleaseGroupType
     *
     * @return string
     */
    public function __toString()
    {
        return $this->releaseGroupType;
    }
}
