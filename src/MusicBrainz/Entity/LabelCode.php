<?php
/**
 * LabelCode.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 * @author     David White [monkeyphp] <david@monkeyphp.com>
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

use InvalidArgumentException;

/**
 * LabelCode
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 */
class LabelCode
{
    /**
     * The label code value
     *
     * @var int
     */
    protected $labelCode;

    /**
     * Constructor
     *
     * @param int $labelCode
     *
     * @return void
     */
    public function __construct($labelCode)
    {
        if (! is_scalar($labelCode) || ! ctype_digit((string)$labelCode)) {
            throw new InvalidArgumentException('Expects a digit');
        }
        $this->labelCode = $labelCode;
    }

    /**
     * Return a string representation of the LabelCode
     *
     * @return string
     */
    public function __toString()
    {
        return (string)$this->labelCode;
    }
}
