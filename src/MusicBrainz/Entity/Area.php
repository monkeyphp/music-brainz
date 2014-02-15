<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace MusicBrainz\Entity;
/**
 * Description of Area
 *
 * @author David White <david@monkeyphp.com>
 */
class Area
{
    protected $name;
    
    protected $sortName;
    
    protected $id;
    
    public function getName()
    {
        return $this->name;
    }

    public function getSortName()
    {
        return $this->sortName;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setSortName($sortName)
    {
        $this->sortName = $sortName;
        return $this;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }


}
