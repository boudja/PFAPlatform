<?php

namespace App\Controller;

use App\Entity\Project;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function ajout(Request $request)
    {
        if($request->isMethod('POST')) {

            $projet = new Project();
            $titre = $request->request->get('titre');
            $categorie = $request->request->get('categorie');
            $outils = $request->request->get('outils');
            $motcle = $request->request->get('mot_cle');
            $encadreur = $request->request->get('responsable');
            $description = $request->request->get('description');

            $projet->setNomProjet($titre);
            $projet->setCategorie($categorie);
            $projet->setOutlis($outils);
            $projet->setMotsCle($motcle);
            $projet->setNomEncadrant($encadreur);
            $projet->setDescription($description);

            $file = $request->files->get('upload');
            $uploadDirect = '../file/PDF';
            $filename = md5(uniqid()).'.' .$file->guessExtension();
            $file->move($uploadDirect, $filename);

            $projet->setPdf($filename);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($projet);
            $entityManager->flush();

            echo "<script>alert('Projet ajouté avec succés')</script>";
            return $this->redirectToRoute('admin');
        } else
        { return $this->render('admin/index.html.twig');}


    }


    /**
     * @Route("/choisir/{id}", name="choisir")
     */
    public function mesprojets(Request $request,$id)
    {
        $projet = $this->getDoctrine()
            ->getRepository(Project::class)
            ->find($id);

        if (!$projet) {
            throw $this->createNotFoundException(
                'Projet Inexistant ! ' . $id
            );

        }

        $projet->setEtat('indisponible');
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->flush();
        return $this->redirectToRoute('home');

    }




    /**
     * @Route("/myproject}", name="myproject")
     */
    public function index()
    {
        return $this->render('web.html.twig');
    }


    /**
     * @Route("/modifier/{id}", name="modifier")
     */
    public function modficiation(Request $request,$id)
    {
        $projet = $this->getDoctrine()
            ->getRepository(Project::class)
            ->find($id);

        if (!$projet) {
            throw $this->createNotFoundException(
                'Projet Inexistant ! ' . $id
            );
        }

        if ($request->isMethod('POST')) {

            $entityManager = $this->getDoctrine()->getManager();
            $titre = $request->request->get('titre');
            $categorie = $request->request->get('categorie');
            $outils = $request->request->get('outils');
            $motcle = $request->request->get('mot_cle');
            $encadreur = $request->request->get('responsable');
            $description = $request->request->get('description');

            $projet->setNomProjet($titre);
            $projet->setCategorie($categorie);
            $projet->setOutlis($outils);
            $projet->setMotsCle($motcle);
            $projet->setNomEncadrant($encadreur);
            $projet->setDescription($description);

            $entityManager->flush();
            return $this->redirectToRoute('projets');


        }

        return $this->render('admin/modification.html.twig',[
            'projet'=>$projet,
            ]);

    }

    /**
     * @Route("/modif", name="modif")
     */
    public function show()
    {
        return $this->render('admin/modification.html.twig');
    }

    /**
     * @Route("/projets", name="projets")
     */
    public function listeProjets()
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Project::class);
        $lesProjets = $repo->findAll();
        return $this->render('admin/suppression.html.twig', [
            'lesProjets' => $lesProjets]);
    }

    /**
     * @Route("/supprimer/{id}", name="supprimer")
     */
    public function suppression($id)
    {

            $projet = $this->getDoctrine()
                ->getRepository(Project::class)
                ->find($id);

            if (!$projet) {
                throw $this->createNotFoundException(
                    'Projet Inexistant ! ' . $id
                );
            }

            $em = $this->getDoctrine()->getManager();
            $em->remove($projet);
            $em->flush();



        return $this->redirectToRoute('projets');
    }

    /**
     * @Route("/inscription", name="inscription")
     */
    public function inscription(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        if($request->isMethod('POST')) {

         /*   $password1 = $request->request->get('password1');
            $password2 = $request->request->get('password2');*/

                $user = new User();
                $username = $request->request->get('username');
                $email = $request->request->get('email');
                $mdp = $request->request->get('password1');

                $user->setUsername($username);
                $user->setEmail($email);

                $role = $request->request->get('role');
                if ($role == 'admin') {
                    $user->setRoles(Array('ROLE_ADMIN'));
                } else {
                    $user->setRoles(Array('ROLE_USER'));
                }

                $password = $passwordEncoder->encodePassword($user, $mdp);
                $user->setPassword($password);

                // 4) save the User!
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();

                return $this->redirectToRoute('login');
            }
            else {
            return $this->render('inscription.html.twig', [
            'controller_name' => 'AdminController',
                ]);
        }
    }





}
