<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientType;
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

}
