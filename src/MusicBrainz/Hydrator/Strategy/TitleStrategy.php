<?php
/**
 * TitleStrategy.php
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
use MusicBrainz\Entity\Title;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

/**
 * TitleStrategy
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Hydrator\Strategy
 */
class TitleStrategy implements StrategyInterface
{
    /**
     * Extract the value from the supplied Title instance
     *
     * @param Title $object
     *
     * @return null|string
     */
    public function extract($object)
    {
        if (! $object instanceof Title) {
            return null;
        }
        return $object->__toString();
    }

    /**
     * Hydrate and return an instance of Title
     *
     * @param string $value
     *
     * @return Title|null
     */
    public function hydrate($value)
    {
        try {
            return new Title($value);
        } catch(Exception $exception) {
            return null;
        }
    }
}
