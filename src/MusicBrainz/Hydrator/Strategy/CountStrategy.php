<?php
/**
 * CountStrategy
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Hydrator\Strategy
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
namespace MusicBrainz\Hydrator\Strategy;

use Exception;
use MusicBrainz\Entity\Count;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

/**
 * Description of CountStrategy
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Hydrator\Strategy
 */
class CountStrategy implements StrategyInterface
{
    /**
     * Extract the values from the supplied Count instance
     *
     * @param Count $object
     *
     * @return null|string
     */
    public function extract($object)
    {
        if (! $object instanceof Count) {
            return null;
        }
        return $object->__toString();
    }

    /**
     * Hydrate and return an instance of Count
     *
     * @param array $value
     *
     * @return Count|null
     */
    public function hydrate($value)
    {
        try {
            return new Count($value);
        } catch(Exception $exception) {
            return null;
        }
    }
}
