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

namespace MusicBrainz\Hydrator\Strategy;

use MusicBrainz\Entity\ReleaseEvent;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

/**
 * Description of ReleaseEventStrategy
 *
 * @author David White <david@monkeyphp.com>
 */
class ReleaseEventStrategy implements StrategyInterface
{
    /**
     * Instance of ClassMethods hydrator
     *
     * @var ClassMethods
     */
    protected $hydrator;

    /**
     * Return an instance of ClassMethods hydrator
     *
     * @return ClassMethods
     */
    protected function getHydrator()
    {
        if (! isset($this->hydrator)) {
            $hydrator = new ClassMethods();
            // date
            $hydrator->addStrategy('area', new AreaStrategy());
            $this->hydrator = $hydrator;
        }
        return $this->hydrator;
    }

    public function extract($value)
    {

    }

    public function hydrate($values)
    {
        if (! is_array($values)) {
            return null;
        }

        if (isset($values['@attributes']) && is_array($values['@attributes'])) {
            $attributes = $values['@attributes'];
            unset($values['@attributes']);
            $values = $values + $attributes;
        }

        if (isset($values['id'])) {
            $values['mbid'] = $values['id'];
            unset($values['id']);
        }

        return $this->getHydrator()->hydrate($values, new ReleaseEvent());
    }
}
