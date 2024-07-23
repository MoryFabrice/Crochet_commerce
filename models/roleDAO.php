<?php

class RoleDAO
{
    public function selectAll()
    {
        $query = Database::connect()->prepare('SELECT * FROM role');
        $query->execute();
        $souscategories = $query->fetchAll(PDO::FETCH_ASSOC);
        return $souscategories;
    }

    public function selectOne($id)
    {
        $query = Database::connect()->prepare('SELECT * FROM role WHERE id= ?');
        $query->execute([$id]);
        $souscategorie = $query->fetch(PDO::FETCH_ASSOC);
        return $souscategorie;
    }

    public function delete($id)
    {
        $query = Database::connect()->prepare('DELETE FROM role WHERE id= ?');
        $query->execute([$id]);
    }

    public function update(Role $role)
    {
        $query = Database::connect()->prepare('UPDATE role SET nom=? WHERE id = ?');
        $query->execute([$role->getNom(), $role->getId()]);
    }

    public function insert(Role $role)
    {
        $query = Database::connect()->prepare('INSERT INTO role (nom) VALUES (?)');
        $query->execute([$role->getNom()]);
    }
}
