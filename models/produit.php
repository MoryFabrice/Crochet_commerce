<?php
class Produit
{

    private $id;
    private $nom;
    private $couleur;
    private $nbPelote;
    private $prix;
    private $description;
    private $imagePrinc;
    private $favoris;
    private $id_categorie;
    public function __construct($id, $nom, $couleur, $nbPelote, $prix, $description, $imagePrinc, $favoris, $id_categorie)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->couleur = $couleur;
        $this->nbPelote = $nbPelote;
        $this->prix = $prix;
        $this->description = $description;
        $this->imagePrinc = $imagePrinc;
        $this->favoris = $favoris;
        $this->id_categorie = $id_categorie;
    }
    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getCouleur()
    {
        return $this->couleur;
    }

    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;
    }
    public function getNbPelote()
    {
        return $this->nbPelote;
    }

    public function setNbPelote($nbPelote)
    {
        $this->nbPelote = $nbPelote;
    }
    public function getPrix()
    {
        return $this->prix;
    }

    public function setPrix($prix)
    {
        $this->prix = $prix;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId_categorie()
    {
        return $this->id_categorie;
    }

    public function setId_categorie($id_categorie)
    {
        $this->id_categorie = $id_categorie;
    }
    public function getImagePrinc()
    {
        return $this->imagePrinc;
    }

    public function setImagePrinc($imagePrinc)
    {
        $this->imagePrinc = $imagePrinc;
    }
    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function getFavoris()
    {
        return $this->favoris;
    }

    public function setFavoris($favoris)
    {
        $this->favoris = $favoris;
    }
}
