<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace MusicBrainz\Entity;
/**
 * Description of ArtistList
 *
 * @author David White <david@monkeyphp.com>
 */
class ArtistSearch
{
    protected $artists;
    
    protected $count;
    
    protected $offset;
    
    public function __construct($artists = array(), $count = 0, $offset = 0)
    {
        $this->setArtists($artists);
        $this->setCount($count);
        $this->setOffset($offset);
    }
    
    public function getArtists()
    {
        return $this->artists;
    }

    public function getCount()
    {
        return $this->count;
    }

    public function getOffset()
    {
        return $this->offset;
    }

    public function setArtists($artists)
    {
        $this->artists = $artists;
        return $this;
    }

    public function setCount($count)
    {
        $this->count = $count;
        return $this;
    }

    public function setOffset($offset)
    {
        $this->offset = $offset;
        return $this;
    }


}
