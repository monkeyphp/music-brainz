<?php
/**
 * AliasStrategy.php
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

use MusicBrainz\Entity\Alias;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

/**
 * AliasStrategy
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Hydrator\Strategy
 */
class AliasStrategy implements StrategyInterface
{
    /**
     * Instance of ClassMethods hydrator
     *
     * @var ClassMethods
     */
    protected $hydrator;

    /**
     * Return an instance of ClassMethods
     *
     * @return ClassMethods
     */
    protected function gethydrator()
    {
        // @codeCoverageIgnoreStart
        if (! isset($this->hydrator)) {
            $hydrator = new ClassMethods(false);
            $hydrator->addStrategy('sortName', new NameStrategy());
            $hydrator->addStrategy('locale', new LocaleStrategy());
            $hydrator->addStrategy('primary', new PrimaryStrategy());
            $this->hydrator = $hydrator;
        }
        return $this->hydrator;
        // @codeCoverageIgnoreEnd
    }

    /**
     * Extract the values from the supplied Alias instance
     *
     * @param Alias $object
     *
     * @return null|array
     */
    public function extract($object)
    {
        if (! $object instanceof Alias) {
            return null;
        }
        return $this->gethydrator()->extract($object);
    }

    /**
     * Hydrate and return an instance of Alias
     *
     * @param array $value The array of values
     *
     * @return null|Alias
     */
    public function hydrate($value)
    {
        if (! is_array($value)) {
            return null;
        }
        if (isset($value['sort-name'])) {
            $value['sortName'] = $value['sort-name'];
            unset($value['sort-name']);
        }
        return $this->getHydrator()->hydrate($value, new Alias());
    }
}
