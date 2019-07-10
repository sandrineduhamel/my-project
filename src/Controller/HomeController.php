<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

//pour tous les controleurs, je fais un extends de la classe AbstractController
class HomeController extends AbstractController
{


    /**
     * @Route("/test3", name="home_index3")
     */
    //(request $request) ce dit objet instancié
    public function index3(Request $request)
    {
        //Je récupère l'info dans l'URL
        if ($request->query->get("age") > 18) //J'utilise la classe reponse pour returné une reponse au navigateur
        {
            return new Response("coucou");

        } else {
            return new Response("aurevoir");
        }

    }

    //Je crée mon chemin (wildcare) vers l'URL
    /**
     * @Route("/blog/{id}", name="id_blog")
     */
    //Je récupère l'info de l'URL
    public function blog($id)
    {

        //Je retourne une info
        return new Response($id);

    }

    /**
     * @Route("/toto", name="toto")
     */
    public function toto()
    {

        return $this->redirectToRoute('home_index3');

    }

    /**
     * @Route("/twig", name="twig")
     */
    public function twigBasic()
    {
        //réponse http valide
        //qui appelle un fichier twig
        //et affiche son contenu (html)
        return $this->render("basic.html.twig");
    }


    //je crée mon chemin
    /**
     * @Route("/exo", name="exo")
     */
    //j'instancie une méthode
    public function exo()
    {

        //Je simule une requête
        //on enregistre le titre dans une variable
        $toto = 'bienvenue exotwig';

        //on appelle un fichier twig avec en premier
        //parametre le nom du fichier twig
        return $this->render("toto.html.twig",

            //et en second parametre un tableau
            //qui contient les variables à envoyer au fichier twig
            [
                'toto' => $toto
            ]
        );
    }

    /*

    /**
     * @Route("/exo1", name="exo1")
     */
    /*public function exo1(){

        $temp = 'chaud';
        $string = "Fait chaud !";
        $string2 ='fait froid !';



        return $this->render("toto.html.twig",
            [
                'vartemp' => $temp,
                'stringExo' => $string,
                'stringExo2' => $string2


            ]
        );
    }  */
    //je cree ma route elle contient le chemin (bout de l'url)+ identifiant de la route (name)
    /**
     * @Route("/exo2", name="exo2")
     */
    //je créer une méthode
    public function exo2()
    {

        //je déclare une variable de type tableau qui contient plusieurs valeurs
        //(camelcase)
        $letters = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r'];
        //je déclare une variable qui va récupérér le fichier twig et le transforme en html
        //reponse qui compile un fichier twig
        //chemin, nom du fichier
        //variables envoyées dans ce fichier twig
        return $this->render("toto.html.twig",
            [
                //on définie et donne une valeur
                'letters' => $letters
            ]


        );
    }

    //je créer une route avec le chemin fleur
    /**
     * @Route ("/exoFleur", name="fleur")
     */
    //je déclare une méthode qui contient une variable
    public function test(request $request)
        // je debute la création d'une page d'article en simulant une base de données
    {


        $articles = [
            //article1
            [
                'titre' => "dracula",
                'contenu' => "En biologie, chez les plantes à fleurs (angiospermes), la fleur constitue l'organe de la reproduction sexuée et l'ensemble des « enveloppes » qui l'entourent. Après la pollinisation, la fleur est fécondée et se transforme en fruit contenant les graines. Les fleurs peuvent être solitaires, mais elles sont le plus souvent regroupées en inflorescences.

                Très tôt, les fleurs ont attiré l’attention des humains, qui les utilisent et les cultivent pour la parure (couronne de fleurs), pour l’ornementation intérieure (fleurs coupées, bouquets, ikebana) et extérieure (jardins, plates-bandes, etc.). Elles sont utilisées en parfumerie, pour leurs fragrances, ainsi qu'en teinture, pour leurs pigments. Les fleurs comestibles servent à la préparation de boissons et de mets.

                Les fleurs ont souvent inspiré les artistes, peintres, poètes, sculpteurs et décorateurs. La culture des fleurs est la floriculture, une branche de l'horticulture.",
                'img' => "https://img.maxisciences.com/article/nature/la-fleur-psychotria-elata_5f5e3406f43df8909891f44356af12aabc2d2a2a.jpg"

            ],
            //article2
            [
                'titre' => "passiflore",
                'contenu' => "En biologie, chez les plantes à fleurs (angiospermes), la fleur constitue l'organe de la reproduction sexuée et l'ensemble des « enveloppes » qui l'entourent. Après la pollinisation, la fleur est fécondée et se transforme en fruit contenant les graines. Les fleurs peuvent être solitaires, mais elles sont le plus souvent regroupées en inflorescences.

                Très tôt, les fleurs ont attiré l’attention des humains, qui les utilisent et les cultivent pour la parure (couronne de fleurs), pour l’ornementation intérieure (fleurs coupées, bouquets, ikebana) et extérieure (jardins, plates-bandes, etc.). Elles sont utilisées en parfumerie, pour leurs fragrances, ainsi qu'en teinture, pour leurs pigments. Les fleurs comestibles servent à la préparation de boissons et de mets.

                Les fleurs ont souvent inspiré les artistes, peintres, poètes, sculpteurs et décorateurs. La culture des fleurs est la floriculture, une branche de l'horticulture.",
                'img' => "https://www.jardindupicvert.com/2928-large_default/passiflore-fleur-de-la-passion-constance-elliot-.jpg"

            ],
            //article3
            [

                'titre' => "lys",
                'contenu' => "En biologie, chez les plantes à fleurs (angiospermes), la fleur constitue l'organe de la reproduction sexuée et l'ensemble des « enveloppes » qui l'entourent. Après la pollinisation, la fleur est fécondée et se transforme en fruit contenant les graines. Les fleurs peuvent être solitaires, mais elles sont le plus souvent regroupées en inflorescences.

                Très tôt, les fleurs ont attiré l’attention des humains, qui les utilisent et les cultivent pour la parure (couronne de fleurs), pour l’ornementation intérieure (fleurs coupées, bouquets, ikebana) et extérieure (jardins, plates-bandes, etc.). Elles sont utilisées en parfumerie, pour leurs fragrances, ainsi qu'en teinture, pour leurs pigments. Les fleurs comestibles servent à la préparation de boissons et de mets.

                Les fleurs ont souvent inspiré les artistes, peintres, poètes, sculpteurs et décorateurs. La culture des fleurs est la floriculture, une branche de l'horticulture.",
                'img' => "http://www.fleurs-chubert.net/img/cms/symbolisme-fleur-de-lys.jpg"

            ],
            //article4
            [
                'titre' => "lys",
                'contenu' => "En biologie, chez les plantes à fleurs (angiospermes), la fleur constitue l'organe de la reproduction sexuée et l'ensemble des « enveloppes » qui l'entourent. Après la pollinisation, la fleur est fécondée et se transforme en fruit contenant les graines. Les fleurs peuvent être solitaires, mais elles sont le plus souvent regroupées en inflorescences.

                 Très tôt, les fleurs ont attiré l’attention des humains, qui les utilisent et les cultivent pour la parure (couronne de fleurs), pour l’ornementation intérieure (fleurs coupées, bouquets, ikebana) et extérieure (jardins, plates-bandes, etc.). Elles sont utilisées en parfumerie, pour leurs fragrances, ainsi qu'en teinture, pour leurs pigments. Les fleurs comestibles servent à la préparation de boissons et de mets.

                 Les fleurs ont souvent inspiré les artistes, peintres, poètes, sculpteurs et décorateurs. La culture des fleurs est la floriculture, une branche de l'horticulture.",
                'img' => "https://www.senteursduquercy.com/3441-large/iris-unguicularis-fleur-violet-fonce-iris-d-alger.jpg"

            ]
        ];

      /* if ($request->query->get("age") > 18)
        {
            return new Response("coucou");

        } else {
            return new Response("accès refusé");
        };*/

        return $this->render("fleur.html.twig",
            [
                'articles' => $articles
            ]
        );
    }

    /**
     * @Route("/linktwig", name="link_twig")
     */
    public function linkTwig()
    {
        return $this->render("linkTwig.html.twig");

    }

    /**
     * @Route("/contact" , name="contact")
     * return une reponse qui contient un fichier 'twig' compilé en html
     */
    public function fleur (){
        return $this->render("contact.html.twig");
    }



}



