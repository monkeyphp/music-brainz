<?php

/**
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
 * Description of SecondaryType
 *
 * @author David White <david@monkeyphp.com>
 */
class SecondaryType
{
    protected $secondaryType;

    public static $secondaryTypes = array(
        ConnectorInterface::SECONDARY_TYPE_LIVE,
        ConnectorInterface::SECONDARY_TYPE_COMPILATION,
    );

    public function __construct($secondaryType)
    {
        if (! is_string($secondaryType) || ! in_array($secondaryType, static::$secondaryTypes)) {
            throw new InvalidArgumentException('Invalid secondary type supplied');
        }
        $this->secondaryType = $secondaryType;
    }

    public function __toString()
    {
        return $this->secondaryType;
    }
}
