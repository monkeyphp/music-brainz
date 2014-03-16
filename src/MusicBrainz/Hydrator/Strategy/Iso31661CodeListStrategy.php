<?php
/**
 * Iso31661CodeListStrategy.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Hydrator\Strategy
 * @author     David White <david@monkeyphp.com>
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

use MusicBrainz\Entity\Iso31661CodeList;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

/**
 * Iso31661CodeListStrategy
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Hydrator\Strategy
 */
class Iso31661CodeListStrategy implements StrategyInterface
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
    protected function getHydrator()
    {
        // @codeCoverageIgnoreStart
        if (! isset($this->hydrator)) {
            $hydrator = new ClassMethods(true);
            $this->hydrator = $hydrator;
        }
        return $this->hydrator;
        // @codeCoverageIgnoreEnd
    }

    public function extract($object)
    {

    }

    /**
     * Hydrate and return an instance of Iso31661CodeList
     *
     * @param array $values
     *
     * @return null|Iso31661CodeList
     */
    public function hydrate($values)
    {
        if (! is_array($values)) {
            return null;
        }
        $iso31661Codes = array();
        $iso31661CodeStrategy = new Iso31661CodeStrategy();

        foreach ($values as $key => $value) {
            $iso31661Codes[] = $iso31661CodeStrategy->hydrate($value);
        }
        $values['iso31661Codes'] = $iso31661Codes;
        $return = $this->getHydrator()->hydrate($values, new Iso31661CodeList());
        return $return;
    }
}
