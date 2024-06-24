<?php

class SouscategorieDAO
{
    public function selectAll()
    {
        $query = Database::connect()->prepare('SELECT * FROM souscategorie');
        $query->execute();
        $souscategories = $query->fetchAll(PDO::FETCH_ASSOC);
        return $souscategories;
    }
    
    public function selectOne($id)
    {
        $query = Database::connect()->prepare('SELECT * FROM souscategorie WHERE id= ?');
        $query->execute([$id]);
        $souscategorie = $query->fetch(PDO::FETCH_ASSOC);
        return $souscategorie;
    }
    
    public function delete($id)
    {
        $query = Database::connect()->prepare('DELETE FROM souscategorie WHERE id= ?');
        $query->execute([$id]);
    }
    
    public function update(Souscategorie $souscategorie)
    {
        $query = Database::connect()->prepare('UPDATE souscategorie SET titre=? WHERE id = ?');
        $query->execute([$souscategorie->getTitre(),$souscategorie->getId()]);
    }
    
    public function insert(Souscategorie $souscategorie)
    {
        $query = Database::connect()->prepare('INSERT INTO souscategorie (titre) VALUES (?)');
        $query->execute([$souscategorie->getTitre()]);
    }
}