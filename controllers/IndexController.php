<?php

class IndexController extends BaseController
{
    public function index()
    {

        // on choisi la template à appeler
        $template = $this->twig->load('index/index.html');

        $post = new Post();
        $listPost = $post->getPosts();

        var_dump($listPost);
        // Puis on affiche la page avec la méthode render
        echo $template->render(['title' => 'Accueil du blog']);
    }
}