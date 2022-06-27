<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    // Nouvelle syntaxe des routs pour symfony 6.
   // #[Route('/home', name: 'home')]

    // Ancienne version de route 

    /**
     * @Route("/hello", name="hello")
     */
    public function hello()
    {
        var_dump("hello");
        die;
    }

    // exercice : faire une route qui va afficher la phrase  
    //"bienveune sur notre site de la mort qui tue"

    /**
     * @Route("welcome", name="welcome") 
     */
    public function welcome()
    {
        dd("Bienvenue sur notre site de la mort qui tue");
    }

    /**                 // wildcard
     * @Route("chiffre/{id}", name="chiffre")
     */
    public function chiffre($id)
    {
        dd($id . " ans");
    }

    /**
     * @Route("about", name="about")
     */
    public function about()
    {
        return new Response ("Nous sommes les développeurs de la table presque ronde");
    }

    // Exercice : créer une route poker qui aura une wildcard, si la wildcard est inférieur à 18 alors il
    // faudra afficher "Vous n'êtes pas autorisé à jouer" et si la wildcard est supérieur ou égale à 18 alors
    // il faudra afficher "Vous êtes autorisé à jouer".

    /**
     * @Route("legal", name="age_legal")
     */
    public function ageLegal()
    {
        return new Response("Vous êtes autorisé à jouer");
    }

    /**
     * @Route("mineur", name="age_mineur")
     */
    public function ageMineur()
    {

        return new Response('Vous n\'êtes pas autorisé à jouer. Retourne dans ta chambre !' );
    }

    /**
     * @Route("nawac", name="mauvaise_reponse")
     */
    public function ageNonValide()
    {
        return new Response ("Entrer un age correct ! Salaud !!");
    }


    /**
     * @Route("poker/{id}", name="poker")
     */
    public function poker($id)
    {
        if( $id >= 18 && $id < 85){
            // return new Response('Vous êtes autorisé à jouer.');
            return $this->redirectToRoute("age_legal");
        }elseif( $id < 18 && $id >= 0){
            // return new Response("Vous n'êtes pas autorisé à jouer.");
            return $this->redirectToRoute("age_mineur");
        }
        else{
            // return new Response("Entrer un age correct !! Salaud !!! ");
            return $this->redirectToRoute("mauvaise_reponse");
        }
    }

    /**
     * @Route("apropos", name="apropos")
     */
    public function aPropos()
    {
        return $this->redirectToRoute("about");
    }

    // Exercice réécrire la méthode poker en remplaçant les new response par redirectToRoute.



}