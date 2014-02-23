<?php
/**
 * Score.php
 *
 * @category    MusicBrainz
 * @package     MusicBrainz
 * @subpackage  MusicBrainz\Entity
 * @author      David White <david@monkeyphp.com>
 *
 * Copyright (C)
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
 * Score
 *
 * @category    MusicBrainz
 * @package     MusicBrainz
 * @subpackage  MusicBrainz\Entity
 */
class Score
{
    /**
     * The value of the Score
     *
     * @var int
     */
    protected $score;

    /**
     * Constructor
     * 
     * @param int $score
     *
     * @throws InvalidArgumentException
     * @return void
     */
    public function __construct($score)
    {
        $score = (int)$score;
        if (! ($score >= 0 && $score <= 100)) {
            throw new InvalidArgumentException('Expects a score between 0 and 100');
        }
        $this->score = $score;
    }

    /**
     * Return a string representation of the Score
     *
     * @return string
     */
    public function __toString()
    {
        return (string)$this->score;
    }
}
