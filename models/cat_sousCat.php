<?php
class Cat_sousCat
{
    private $categorie_id;
    private $sousCategorie_id;
    public function __construct($categorie_id, $sousCategorie_id)
    {
        $this->categorie_id = $categorie_id;
        $this->sousCategorie_id = $sousCategorie_id;
    }
    public function getCategorie_id()
    {
        return $this->categorie_id;
    }

    public function setCategorie_id($categorie_id)
    {
        $this->categorie_id = $categorie_id;
    }
    public function getSousCategorie_id()
    {
        return $this->sousCategorie_id;
    }

    public function setSousCategorie_id($sousCategorie_id)
    {
        $this->sousCategorie_id = $sousCategorie_id;
    }
}
