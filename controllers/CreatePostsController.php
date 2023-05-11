<?php
namespace Controllers;

class CreatePostsController extends BaseController
{
    private string $errors = '';

    public function createPost()
    {

        // on choisi la template à appeler
        $template = $this->twig->load('create-posts/create.html');


        // Puis on affiche la page avec la méthode render

        echo $template->render([
            'title' => 'Création d\'un post',
            'errors' => $this->errors


        ]);

        if (!empty($_POST['titre']) && !empty($_POST['contenu']) && !empty($_POST['submit'])) {



            $title = $_POST['titre'];
            $title = ucfirst(trim($title));
            $content = $_POST['contenu'];
            $content = ucfirst(trim($content));
            $dateCreation = date('Y-m-d H:i:s');
            $dateModification = date('Y-m-d H:i:s');
            $idUser = $_SESSION['id'];

            $post = new Post();
            $post->createPost($title, $content, $dateCreation, $dateModification, $idUser);
        } else {
            $this->errors = 'Veuillez remplir tous les champs';

            echo $template->render(['title' => 'Création d\'un post']);
        }


        $post = new Post();

        if (isset($_REQUEST['creer'])) {

            $title = $_REQUEST['title'];
            $content = $_REQUEST['content'];
            $dateCreation = date('Y-m-d H:i:s');
            $dateModification = date('Y-m-d H:i:s');
            $id_user = 1;
            $post->insertPost($title, $content, $dateCreation, $dateModification, $id_user);
        }
    }
}
