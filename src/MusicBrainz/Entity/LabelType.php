<?php
/**
 * LabelType.php
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
 * LabelType
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 */
class LabelType
{
    /**
     * The value of the LabelType
     *
     * @var string
     */
    protected $labelType;

    /**
     * An array of valid LabelType values
     * 
     * @var array
     */
    public static $labelTypes = array(
        ConnectorInterface::LABEL_TYPE_HOLDING,
        ConnectorInterface::LABEL_TYPE_ORIGINAL_PRODUCTION,
        ConnectorInterface::LABEL_TYPE_PRODUCTION,
        ConnectorInterface::LABEL_TYPE_PUBLISHER,
        ConnectorInterface::LABEL_TYPE_REISSUE_PRODUCTION
    );

    /**
     * Constructor
     *
     * @param string $labelType
     *
     * @throws InvalidArgumentException
     * @return void
     */
    public function __construct($labelType)
    {
        if (! is_string($labelType) || ! in_array($labelType, static::$labelTypes)) {
            throw new InvalidArgumentException('Invalid label type supplied');
        }
        $this->labelType = $labelType;
    }

    /**
     * Return a string representation of the LabelType
     *
     * @return string
     */
    public function __toString()
    {
        return $this->labelType;
    }
}
