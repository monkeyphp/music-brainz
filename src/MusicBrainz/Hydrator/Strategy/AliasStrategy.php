<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace MusicBrainz\Hydrator\Strategy;

use MusicBrainz\Entity\Alias;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;
/**
 * Description of AliasStrategy
 *
 * @author David White <david@monkeyphp.com>
 */
class AliasStrategy implements StrategyInterface
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
        if (isset($value['sort-name'])) {
            $value['sortName'] = $value['sort-name'];
            unset($value['sort-name']);
        }
        //var_dump($value);
        return $this->getHydrator()->hydrate($value, new Alias());
    }

}
