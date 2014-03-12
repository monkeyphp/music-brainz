<?php
/**
 * Quality.php
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
 * Quality
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 */
class Quality
{
    /**
     * An array of quality types
     * 
     * @var array
     */
    public static $qualityTypes = array(
        ConnectorInterface::RELEASE_QUALITY_HIGH,
        ConnectorInterface::RELEASE_QUALITY_NORMAL,
    );

    /**
     * The value of the Quality
     *
     * @var string
     */
    protected $quality;

    /**
     * Constructor
     *
     * @param string $quality
     *
     * @throws InvalidArgumentException
     * @return void
     */
    public function __construct($quality)
    {
        if (! is_string($quality) || ! in_array($quality, static::$qualityTypes)) {
            throw new InvalidArgumentException('Supplied value is invalid');
        }
        $this->quality = $quality;
    }

    /**
     * Return a string representation of the Quality
     *
     * @return string
     */
    public function __toString()
    {
        return $this->quality;
    }
}
