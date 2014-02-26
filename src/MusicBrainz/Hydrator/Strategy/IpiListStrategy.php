<?php
/**
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

use MusicBrainz\Entity\IpiList;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

/**
 * Description of IpiListStrategy
 *
 * @author David White <david@monkeyphp.com>
 */
class IpiListStrategy implements StrategyInterface
{
    protected $hydrator;

    protected function getHydrator()
    {
        if (! isset($this->hydrator)) {
            $this->hydrator = new ClassMethods();
        }
        return $this->hydrator;
    }

    public function extract($value)
    {

    }

    public function hydrate($value)
    {
        if (! is_array($value) || ! isset($value['ipi']) || ! is_array($value['ipi'])) {
            return null;
        }
        $ipis = array();
        $ipiStrategy = new IpiStrategy();
        foreach ($value['ipi'] as $index => $alias) {
            $ipis[$index] = $ipiStrategy->hydrate($alias);
        }
        $values['ipis'] = $ipis;
        unset($value['ipi']);
        return $this->getHydrator()->hydrate($values, new IpiList());
    }
}
