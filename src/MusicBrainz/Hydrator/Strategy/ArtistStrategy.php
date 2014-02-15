<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace MusicBrainz\Hydrator\Strategy;

use MusicBrainz\Entity\Artist;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

/**
 * Description of ArtistStrategy
 *
 * @author David White <david@monkeyphp.com>
 */
class ArtistStrategy implements StrategyInterface
{
    
    protected $hydrator;
    
    public function getHydrator()
    {
        if (! isset($this->hydrator)) {
            $hydrator = new ClassMethods();
            $hydrator->addStrategy('area',      new AreaStrategy());
            $hydrator->addStrategy('beginArea', new AreaStrategy());
            $hydrator->addStrategy('lifeSpan',  new LifeSpanStrategy());
            $hydrator->addStrategy('aliases',   new AliasesStrategy());
            $hydrator->addStrategy('tags',      new TagsStrategy());
            
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
            // sort-name
            if (isset($value['sort-name'])) {
                $value['sortName'] = $value['sort-name'];
                unset($value['sort-name']);
            }
            // begin-area
            if (isset($value['begin-area'])) {
                $value['beginArea'] = $value['begin-area'];
                unset($value['begin-area']);
            }
            // life-span
            if (isset($value['life-span'])) {
                $value['lifeSpan'] = $value['life-span'];
                unset($value['life-span']);
            }
            // alias-list
            if (isset($value['alias-list'])) {
                $value['aliases'] = $value['alias-list'];
                unset($value['alias-list']);
            }
            // tag-list
            if (isset($value['tag-list'])) {
                $value['tags'] = $value['tag-list'];
                unset($value['tag-list']);
            }
        }
        
        return $this->getHydrator()->hydrate($value, new Artist());
    }

}
