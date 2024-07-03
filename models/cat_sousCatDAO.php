<?php

class Cat_sousCatDAO
{
    public function selectAll()
    {
        $query = Database::connect()->prepare('SELECT * FROM categorie_souscategorie');
        $query->execute();
        $cat_sousCat = $query->fetchAll(PDO::FETCH_ASSOC);
        return $cat_sousCat;
    }

    public function selectAllByCatAndBySousCat()
    {
        $query = Database::connect()->prepare('SELECT * FROM categorie_souscategorie WHERE category_id = ? AND sousCategorie_id = ?');
        $query->execute();
        $cat_sousCat = $query->fetchAll(PDO::FETCH_ASSOC);
        return $cat_sousCat;
    }

    // public function selectOne($id)
    // {
    //     $query = Database::connect()->prepare('SELECT * FROM categorie_souscategorie WHERE id= ?');
    //     $query->execute([$id]);
    //     $souscategorie = $query->fetch(PDO::FETCH_ASSOC);
    //     return $souscategorie;
    // }

    public function delete($idCat, $idSousCat)
    {
        $query = Database::connect()->prepare('DELETE FROM categorie_souscategorie WHERE categorie_id= ? AND sousCategorie_id=?');
        $query->execute([$idCat, $idSousCat]);
    }

    // public function update(Cat_sousCat $cat_sousCat)
    // {
    //     $query = Database::connect()->prepare('UPDATE categorie_souscategorie SET categorie_id=?, souscategorie_id=? WHERE id = ?');
    //     $query->execute([$souscategorie->getTitre(), $souscategorie->getId()]);
    // }

    public function insert(Cat_sousCat $cat_sousCat)
    {
        $query = Database::connect()->prepare('INSERT INTO categorie_souscategorie (categorie_id, sousCategorie_id) VALUES (?,?)');
        $query->execute([$cat_sousCat->getCategorie_id(), $cat_sousCat->getSousCategorie_id()]);
    }
}
