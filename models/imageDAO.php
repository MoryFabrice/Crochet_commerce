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

    public function selectOne($idProduit)
    {
        $query = Database::connect()->prepare('SELECT * FROM image WHERE id_produit= ?');
        $query->execute([$idProduit]);
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
        $query = Database::connect()->prepare('UPDATE image SET url=?,id_produit=? WHERE id = ?');
        $query->execute([$image->getUrl(), $image->getId_produit(), $image->getId()]);
    }

    public function insert(Image $image)
    {
        $query = Database::connect()->prepare('INSERT INTO image (url,id_produit) VALUES (?,?)');
        $query->execute([$image->getUrl(), $image->getId_produit()]);
    }
}
