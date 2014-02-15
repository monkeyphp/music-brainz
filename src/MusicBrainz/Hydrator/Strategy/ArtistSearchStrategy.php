<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace MusicBrainz\Hydrator\Strategy;

use MusicBrainz\Entity\ArtistSearch;
use MusicBrainz\Hydrator\Strategy\ArtistStrategy;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;
/**
 * Description of ArtistsStrategy
 *
 * @author David White <david@monkeyphp.com>
 */
class ArtistSearchStrategy implements StrategyInterface
{
    
    protected $artistStrategy;
    
    protected function getArtistStrategy()
    {
        if (! isset($this->artistStrategy)) {
            $this->artistStrategy = new ArtistStrategy();
        }
        return $this->artistStrategy;
    }
    
    public function extract($value)
    {
        
    }
    
    public function hydrate($value)
    {
        $artists = array();
        $count = $offset = 0;
        
        if (is_array($value)) {
            
            if (array_key_exists('artist-list', $value) && 
                is_array($value['artist-list'])
            ) {
                $list   = $value['artist-list'];
                $offset = (isset($list['offset'])) ? (int)$list['offset'] : 0;
                $count  = (isset($list['count']))  ? (int)$list['count']  : 0;
                
                if (isset($list['artist'])) {
                    if ($count === 1) {
                        $list['artist'] = array($list['artist']);
                    } 
                    foreach ($list['artist'] as $data) {
                        $artists[] = $this->getArtistStrategy()->hydrate($data);
                    }
                }
            }
        }
        return new ArtistSearch($artists, $count, $offset);
    }
}
