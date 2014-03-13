<?php
/**
 * AliasListStrategy.php
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

use MusicBrainz\Entity\AliasList;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

/**
 * AliasListStrategy
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Hydrator\Strategy
 */
class AliasListStrategy implements StrategyInterface
{
    /**
     * Instance of ClassMethods
     *
     * @var ClassMethods
     */
    protected $hydrator;

    /**
     * Return an instance of ClassMethods
     *
     * @return ClassMethods
     */
    protected function getHydrator()
    {
        // @codeCoverageIgnoreStart
        if (! isset($this->hydrator)) {
            $hydrator = new ClassMethods();
            $this->hydrator = $hydrator;
        }
        return $this->hydrator;
        // @codeCoverageIgnoreEnd
    }

    /**
     * Extract and return the values from the AliasList
     *
     * @param AliasList $object
     *
     * @return array|null
     */
    public function extract($object)
    {
        if (! $object instanceof AliasList) {
            return null;
        }

        $values = $this->getHydrator()->extract($object);

        $aliasStrategy = new AliasStrategy();
        foreach ($values['aliases'] as $index => $alias) {
            $values['aliases'][$index] = $aliasStrategy->extract($alias);
        }

        return $values;
    }

    /**
     * Hydrate and return an instance of AliasList
     *
     * @param array $values The array of values to hydrate the AliasList instance with
     *
     * @return AliasList|null
     */
    public function hydrate($values)
    {
        if (! is_array($values) || ! isset($values['alias']) || ! is_array($values['alias'])) {
            return null;
        }


        $aliases = array();
        $aliasStrategy = new AliasStrategy();

        foreach ($values['alias'] as $index => $alias) {
            $aliases[$index] = $aliasStrategy->hydrate($alias);
        }

        $values['aliases'] = $aliases;
        unset($values['alias']);

        return $this->getHydrator()->hydrate($values, new AliasList());
    }
}
