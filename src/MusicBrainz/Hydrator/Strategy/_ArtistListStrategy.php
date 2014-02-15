<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace MusicBrainz\Hydrator\Strategy;

use MusicBrainz\Entity\Artist;
use MusicBrainz\Entity\ArtistList;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;
/**
 * Description of ArtistListStrategy
 *
 * @author David White <david@monkeyphp.com>
 */
class ArtistListStrategy implements StrategyInterface
{
    protected $hydrator;
    
    public function getHydrator()
    {
        if (! isset($this->hydrator)) {
            $hydrator = new ClassMethods();
            $hydrator->addStrategy('artists', new ArtistsStrategy());
            $this->hydrator = $hydrator;
        }
        return $this->hydrator;
    }
    
    
    public function extract($value)
    {
        
    }

    public function hydrate($value)
    {   
        $artists = array();
        
        if (isset($value['count'])) {
            
            $count = (int)$value['count'];
            if ($count === 1) {
                $value['artist'] = array($value['artist']);
            } 
            $value['artists'] = $value['artist'];
            unset($value['artist']);
        }
        
        return $this->getHydrator()->hydrate($value, new ArtistList());
    }
}
