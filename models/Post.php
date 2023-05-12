<?php

class Post extends Database
{


    public function createPost($title, $content, $dateCreation, $dateModification, $idUser)
    {
        $req = $this->connexion->prepare("INSERT INTO posts(titre, contenu, dateCreation, dateModification, idUser ) VALUES (?, ?, ?, ?, ?)");
        $req->execute(array($title, $content, $dateCreation, $dateModification, $idUser));
    }

    public function getPosts()
    {
        $posts = $this->connexion->query('SELECT * FROM posts ORDER BY id DESC');
        return $posts;
    }
    
    public function insertPost($title, $content, $dateCreation, $dateModification, $id_user)
    {
        $req = $this->connexion->prepare("INSERT INTO post(title, contenu, dateCreation, dateModification, idUser) VALUES (?, ?, ?, ?, ?)");
        $req->execute(array($title, $content, $dateCreation, $dateModification, $id_user));

    }
}