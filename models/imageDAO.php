<?php

class ImageDAO
{
    public function selectAll()
    {
        $query = Database::connect()->prepare('SELECT * FROM image');
        $query->execute();
        $images = $query->fetchAll(PDO::FETCH_ASSOC);
        return $images;
    }
    
    public function selectOne($id)
    {
        $query = Database::connect()->prepare('SELECT * FROM image WHERE id= ?');
        $query->execute([$id]);
        $image = $query->fetch(PDO::FETCH_ASSOC);
        return $image;
    }
    
    public function delete($id)
    {
        $query = Database::connect()->prepare('DELETE FROM image WHERE id= ?');
        $query->execute([$id]);
    }
    
    public function update(Image $image)
    {
        $query = Database::connect()->prepare('UPDATE image SET id_produit=?,url=? WHERE id = ?');
        $query->execute([$image->getId_produit(),$image->getUrl(),$image->getId()]);
    }
    
    public function insert(Image $image)
    {
        $query = Database::connect()->prepare('INSERT INTO image (id_produit,url) VALUES (?,?)');
        $query->execute([$image->getId_produit(),$image->getUrl()]);
    }
}