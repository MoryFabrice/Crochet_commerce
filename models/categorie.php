<?php
class Categorie
{
    private $id;
    private $titre;
    private $id_sousCategorie;
    public function __construct($id, $titre, $id_sousCategorie)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->id_sousCategorie = $id_sousCategorie;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId_sousCategorie()
    {
        return $this->id_sousCategorie;
    }

    public function setId_sousCategorie($id_sousCategorie)
    {
        $this->id_sousCategorie = $id_sousCategorie;
    }
    public function getTitre()
    {
        return $this->titre;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
    }
}
