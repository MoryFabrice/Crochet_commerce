<?php
class Image
{
    private $id;
    private $url;
    private $id_produit;
    public function __construct($id, $url, $id_produit)
    {
        $this->id = $id;
        $this->url = $url;
        $this->id_produit = $id_produit;
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
