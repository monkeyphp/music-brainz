<?php
/**
 * AreaType.php
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

use InvalidArgumentException;
use MusicBrainz\Connector\ConnectorInterface;

/**
 * AreaType
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 */
class AreaType
{
    /**
     * The value of the AreaType
     *
     * @var string
     */
    protected $areaType;

    /**
     * An array of valid area types
     *
     * @var array
     */
    public static $areaTypes = array(
        ConnectorInterface::AREA_TYPE_COUNTRY,
        ConnectorInterface::AREA_TYPE_SUBDIVISION,
        ConnectorInterface::AREA_TYPE_MUNICIPALITY,
    );

    /**
     * Constructor
     *
     * @param string $areaType The value of the AreaType
     *
     * @throws InvalidArgumentException
     * @return void
     */
    public function __construct($areaType)
    {
        if (! is_string($areaType) || ! in_array($areaType, static::$areaTypes)) {
            throw new InvalidArgumentException('Invalid area type');
        }
        $this->areaType = $areaType;
    }

    /**
     * Return a string representation of the AreaType
     *
     * @return string
     */
    public function __toString()
    {
        return $this->areaType;
    }
}
