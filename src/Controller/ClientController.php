<?php

namespace App\Controller;

use App\Entity\Client;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\ClientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;


class ClientController extends AbstractController
{
    
    
    //Retourner les leads positifs
    
    #[Route('/client', name: 'app_client', methods: ['GET'])]
    public function index(ClientRepository $clientRepository,NormalizerInterface $normalizer): JsonResponse
    {
        $leadpositif = $clientRepository->findBy(array('statut' => 'PROJET AVEC RAPPEL COMMERCIAL'));
        $donnees = $normalizer->normalize($leadpositif,'json');
         
        return new JsonResponse($donnees, 200);

    }
 
    
    // Mettre les numéros au bon format 10 digit
    
    
    #[Route('/numeroformat', name: 'app_numeroformat', methods: ['GET'])]
public function numeroformat(ManagerRegistry $doctrine,ClientRepository $clientRepository): Response
{
    
    $em = $doctrine->getManager();
    $rep = $clientRepository->findAll();
    foreach( $rep as $val)
{
    //Vérifier si le numéro est supérieur à 10

      if(strlen($val->getTelephone())>10)
       {
        $tab1 = ['0033','+33'];
        $tab2 = ['0','0'];
        $val->setCiv($val->getCiv())
           ->setNom($val->getNom())
           ->setPrenom($val->getPrenom())
           ->setEmail($val->getEmail())
           ->setCodePostal($val->getCodePostal())
           ->setIdContact($val->getIdContact())
           ->setEcheanceProjet($val->getEcheanceProjet())
           ->setStatut($val->getStatut())
           ->setCodeConcession($val->getCodeConcession())
           ->setTelephone(str_replace($tab1,$tab2,$val->getTelephone()));
       }
           
       //Vérifier et identifier le numéro inférieur à 10 ( faux_numéro ) 

    else if (strlen($val->getTelephone())< 10) 
    {
        echo "faux numéro ";
        echo  $val->getIdContact();
    } 
    
// Vérifier si le numéro contient des caractères spéciaux et remplacer 

    $tab1 = ['.','-',' ','/'];
    $tab2 = ['','','',''];

    $val->setCiv($val->getCiv())
           ->setNom($val->getNom())
           ->setPrenom($val->getPrenom())
           ->setEmail($val->getEmail())
           ->setCodePostal($val->getCodePostal())
           ->setIdContact($val->getIdContact())
           ->setEcheanceProjet($val->getEcheanceProjet())
           ->setStatut($val->getStatut())
           ->setCodeConcession($val->getCodeConcession())
           ->setTelephone(str_replace($tab1,$tab2,$val->getTelephone()));
    }

    // Remplacer dans la base de données
    
    $em->flush();
    $clientRepository->save($val, true);
    dd($val);
    }


}
