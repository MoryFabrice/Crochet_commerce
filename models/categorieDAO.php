<?php

class CategorieDAO
{
    public function selectAll()
    {
        $query = Database::connect()->prepare('SELECT * FROM categorie');
        $query->execute();
        $categories = $query->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }

    public function selectOne($id)
    {
        $query = Database::connect()->prepare('SELECT * FROM categorie WHERE id= ?');
        $query->execute([$id]);
        $categorie = $query->fetch(PDO::FETCH_ASSOC);
        return $categorie;
    }

    public function delete($id)
    {
        $query = Database::connect()->prepare('DELETE FROM categorie WHERE id= ?');
        $query->execute([$id]);
    }

    public function update(Categorie $categorie)
    {
        $query = Database::connect()->prepare('UPDATE categorie SET titre=?,id_sousCategorie=? WHERE id = ?');
        $query->execute([$categorie->getTitre(), $categorie->getId_sousCategorie(), $categorie->getId()]);
    }

    public function insert(Categorie $categorie)
    {
        $query = Database::connect()->prepare('INSERT INTO categorie (titre,id_sousCategorie) VALUES (?,?)');
        $query->execute([$categorie->getTitre(), $categorie->getId_sousCategorie()]);
    }
}
