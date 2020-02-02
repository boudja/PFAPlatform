<?php

namespace App\Controller;

use App\Entity\Project;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
        return $this->render('home_controller/home.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }


    /**
     * @Route("/web", name="web")
     */
    public function webPFA()
    {
      /*  $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Project::class);
        $lesProjets = $repo->findAll();*/
        $cat= "Web";
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Project::class);
        $lesProjets = $repo->findByCategory($cat);
        return $this->render('web.html.twig', [
            'lesProjets' => $lesProjets]);
    }



    /**
     * @Route("/mobile", name="mobile")
     */
    public function mobilePFA()
    {
        /*  $em = $this->getDoctrine()->getManager();
          $repo = $em->getRepository(Project::class);
          $lesProjets = $repo->findAll();*/

        $cat= "Mobile";
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Project::class);
        $lesProjets = $repo->findByCategory($cat);
        return $this->render('mobile.html.twig', [
            'lesProjets' => $lesProjets]);
    }

    /**
     * @Route("/cloud", name="cloud")
     */
    public function cloudPFA()
    {
        /*  $em = $this->getDoctrine()->getManager();
          $repo = $em->getRepository(Project::class);
          $lesProjets = $repo->findAll();*/

        $cat= "Cloud";
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Project::class);
        $lesProjets = $repo->findByCategory($cat);
        return $this->render('cloud.html.twig', [
            'lesProjets' => $lesProjets]);
    }
}


