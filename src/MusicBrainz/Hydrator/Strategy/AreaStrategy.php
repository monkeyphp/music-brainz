<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace MusicBrainz\Hydrator\Strategy;

use MusicBrainz\Entity\Area;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;
/**
 * Description of AreaStrategy
 *
 * @author David White <david@monkeyphp.com>
 */
class AreaStrategy implements StrategyInterface
{
    
    protected $hydrator;
    
    public function getHydrator()
    {
        if (! isset($this->hydrator)) {
            $hydrator = new ClassMethods();
            $this->hydrator = $hydrator;
        }
        return $this->hydrator;
    }

    public function extract($value)
    {
        
    }

    public function hydrate($value)
    {
        if (is_array($value)) {
            if (isset($value['sort-name'])) {
                $value['sortName'] = $value['sort-name'];
                unset($value['sort-name']);
            }
        }
        
        return $this->getHydrator()->hydrate($value, new Area());
    }
}
