<?php


// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class AdvertController extends Controller
{
    /**
     * @Route("/plateform/advert/{id}", name="oc_platform_view")
     * @Template()
     */
    public function indexAction()
    {
        // On veut avoir l'URL de l'annonce d'id 5.
        $url = $this->get('router')->generate(
            'oc_platform_view', // 1er argument : le nom de la route
            array('id' => 5)    // 2e argument : les valeurs des paramètres
        );
        // $url vaut « /platform/advert/5 »

        return new Response("L'URL de l'annonce d'id 5 est : ".$url);
    }


    public function helloAction()
    {
        return new Response("Hello");
    }

    /**
     * @Route("/platform/advert/view/{id}", name="oc_advert_view")
     */
    public function viewAction($id)
    {
        // $id vaut 5 si l'on a appelé l'URL /platform/advert/5

        // Ici, on récupèrera depuis la base de données
        // l'annonce correspondant à l'id $id.
        // Puis on passera l'annonce à la vue pour
        // qu'elle puisse l'afficher

        return new Response("Affichage de l'annonce d'id : ".$id);
    }

    /**
     * @Route("/platform/{year}/{slug}.{_format}",
     * defaults={"_format":"html"},
     * requirements={
     *         "year": "\d{4}",
     *         "_format": "html|xml"
     *     }
     *)
     */
    // On récupère tous les paramètres en arguments de la méthode
    public function viewSlugAction($slug, $year, $_format)
    {
        return new Response(
            "On pourrait afficher l'annonce correspondant au
            slug '".$slug."', créée en ".$year." et au format ".$_format."."
        );
    }
}