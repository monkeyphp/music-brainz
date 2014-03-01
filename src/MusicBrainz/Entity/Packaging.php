<?php
/**
 * Packaging.php
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
 * Packaging
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 */
class Packaging
{
    public static $packagingTypes = array(
        ConnectorInterface::RELEASE_PACKAGING_CASSETTE_CASE,
        ConnectorInterface::RELEASE_PACKAGING_JEWEL_CASE,
        ConnectorInterface::RELEASE_PACKAGING_CARDBOAD_PAPER_SLEEVE,
    );

    /**
     * The value of the Packaging
     *
     * @var string
     */
    protected $packaging;

    /**
     * Constructor
     *
     * @param string $packaging
     *
     * @throws InvalidArgumentException
     * @return void
     */
    public function __construct($packaging)
    {
        if (! is_string($packaging) || ! in_array($packaging, static::$packagingTypes)) {
            throw new InvalidArgumentException('Invalid value supplied');
        }
        $this->packaging = $packaging;
    }

    /**
     * Return a string representation of the Packaging
     *
     * @return string
     */
    public function __toString()
    {
        return $this->packaging;
    }
}
