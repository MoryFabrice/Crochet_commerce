<?php

class UtilisateurDAO
{
    public function selectAll()
    {
        $query = Database::connect()->prepare('SELECT * FROM utilisateur');
        $query->execute();
        $souscategories = $query->fetchAll(PDO::FETCH_ASSOC);
        return $souscategories;
    }

    public function selectOne($id)
    {
        $query = Database::connect()->prepare('SELECT * FROM utilisateur WHERE id= ?');
        $query->execute([$id]);
        $souscategorie = $query->fetch(PDO::FETCH_ASSOC);
        return $souscategorie;
    }

    public function delete($id)
    {
        $query = Database::connect()->prepare('DELETE FROM utilisateur WHERE id= ?');
        $query->execute([$id]);
    }

    public function update(Utilisateur $utilisateur)
    {
        $query = Database::connect()->prepare('UPDATE utilisateur SET nom=?,prenom=?,adresse=?,cp=?,email=?,motDePasse=?,avatar=?,id_role=? WHERE id = ?');
        $query->execute([$utilisateur->getNom(), $utilisateur->getPrenom(), $utilisateur->getAdresse(), $utilisateur->getCp(), $utilisateur->getEmail(), $utilisateur->getMotDePasse(), $utilisateur->getAvatar(), $utilisateur->getIdRole(), $utilisateur->getId()]);
    }

    public function insert(Utilisateur $utilisateur)
    {
        try {
            $query = Database::connect()->prepare('INSERT INTO utilisateur (nom,prenom,adresse,cp,email,motDePasse,avatar,id_role) VALUES (?,?,?,?,?,?,?,?)');
            $query->execute([$utilisateur->getNom(), $utilisateur->getPrenom(), $utilisateur->getAdresse(), $utilisateur->getCp(), $utilisateur->getEmail(), $utilisateur->getMotDePasse(), $utilisateur->getAvatar(), $utilisateur->getIdRole()]);
            $retour = $query->rowCount();
        } catch (PDOException $e) {
            $retour = $e->getMessage();
        }


        return $retour;
    }
}
