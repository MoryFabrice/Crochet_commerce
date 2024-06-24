<?php

class ProduitDAO
{
    public function selectAll()
    {
        $query = Database::connect()->prepare('SELECT * FROM produit');
        $query->execute();
        $produits = $query->fetchAll(PDO::FETCH_ASSOC);
        return $produits;
    }

    public function selectOne($id)
    {
        $query = Database::connect()->prepare('SELECT * FROM produit WHERE id= ?');
        $query->execute([$id]);
        $produit = $query->fetch(PDO::FETCH_ASSOC);
        return $produit;
    }

    public function selectFav()
    {
        $query = Database::connect()->prepare('SELECT * FROM produit WHERE favoris= ?');
        $query->execute([true]);
        $produit = $query->fetch(PDO::FETCH_ASSOC);
        return $produit;
    }
    public function selectAllByCat($idCategorie)
    {
        $query = Database::connect()->prepare('SELECT * FROM produit WHERE id_categorie= ?');
        $query->execute([$idCategorie]);
        $produits = $query->fetchAll(PDO::FETCH_ASSOC);
        return $produits;
    }

    public function delete($id)
    {
        $query = Database::connect()->prepare('DELETE FROM produit WHERE id= ?');
        $query->execute([$id]);
    }

    public function update(Produit $produit)
    {
        $query = Database::connect()->prepare('UPDATE produit SET nom=?,couleur=?,nbPelote=?,prix=?,description=?,imagePrinc=?,favoris=?,id_categorie=? WHERE id = ?');
        $query->execute([$produit->getNom(), $produit->getCouleur(), $produit->getNbPelote(), $produit->getPrix(), $produit->getDescription(), $produit->getImagePrinc(), $produit->getFavoris(), $produit->getId_categorie(), $produit->getId()]);
    }

    public function insert(Produit $produit)
    {
        $query = Database::connect()->prepare('INSERT INTO produit (nom,couleur,nbPelote,prix,description,imagePrinc,favoris,id_categorie) VALUES (?,?,?,?,?,?,?,?)');
        $query->execute([$produit->getNom(), $produit->getCouleur(), $produit->getNbPelote(), $produit->getPrix(), $produit->getDescription(), $produit->getImagePrinc(), $produit->getFavoris(), $produit->getId_categorie()]);
    }
}
