<?php
/**
 * LifeSpanStrategy.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Hydrator\Strategy
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 *
 * Copyright (C) 2014  David White
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
 * along with this program.  If not, see [http://www.gnu.org/licenses/].
 */
namespace MusicBrainz\Hydrator\Strategy;

use MusicBrainz\Entity\LifeSpan;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

/**
 * LifeSpanStrategy
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Hydrator\Strategy
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 */
class LifeSpanStrategy implements StrategyInterface
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
    public function getHydrator()
    {
        if (! isset($this->hydrator)) {
            $hydrator = new ClassMethods();
            $hydrator->addStrategy('ended', new EndedStrategy());
            $this->hydrator = $hydrator;
        }

        return $this->hydrator;
    }

    /**
     * Extract the values from the supplied LifeSpan instance
     *
     * @param LifeSpan $value
     *
     * @return null|LifeSpan
     */
    public function extract($value)
    {
        if (! $value instanceof LifeSpan) {
            return null;
        }
        return $this->getHydrator()->extract($value);
    }

    /**
     * Hydrate and return an instance of LifeSpan
     *
     * @param array $value
     *
     * @return null|LifeSpan
     */
    public function hydrate($value)
    {
        if (! is_array($value)) {
            return null;
        }
        return $this->getHydrator()->hydrate($value, new LifeSpan());
    }
}
