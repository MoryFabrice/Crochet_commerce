<?php
class Image
{
    private $id;
    private $id_produit;
    private $url;
    public function __construct($id, $id_produit, $url)
    {
        $this->id = $id;
        $this->id_produit = $id_produit;
        $this->url = $url;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId_produit()
    {
        return $this->id_produit;
    }

    public function setId_produit($id_produit)
    {
        $this->id_produit = $id_produit;
    }
    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }
}
