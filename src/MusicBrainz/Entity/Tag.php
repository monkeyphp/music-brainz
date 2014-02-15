<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace MusicBrainz\Entity;
/**
 * Description of Tag
 *
 * @author David White <david@monkeyphp.com>
 */
class Tag
{
    protected $name;
    
    protected $count;
    
    public function getName()
    {
        return $this->name;
    }

    public function getCount()
    {
        return $this->count;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setCount($count)
    {
        $this->count = $count;
        return $this;
    }


}
