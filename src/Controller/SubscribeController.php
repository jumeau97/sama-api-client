<?php

namespace App\Controller;

use App\Entity\Subscribe;
use App\Entity\SubscribeOption;
use App\Entity\SubscribeTerm;
use App\Repository\SubscribeOptionsRepository;
use App\Repository\SubscribeRepository;
use App\Repository\SubscribeTermRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/subscribe')]
class SubscribeController extends AbstractController
{


    /*POST DATA*/
    #[Route('/new', name: 'app_subscribe_new', methods: "POST")]
    public function newSubscribe(SubscribeRepository $subscribeRepository, Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        if ($data){
            $subscribe = new Subscribe();
            $subscribe->setName($data['name']);
            $subscribe->setType($data['type']);
            $subscribe->setPrice($data['price']);

            $subscribeRepository->save($subscribe, true);
            return  new  JsonResponse(["message"=>"Success", "status"=>"200", "data"=>$subscribe]);

        }else return  new  JsonResponse(["Error"=> $data]);
    }

    #[Route('/newoption', name: 'app_subscribe_newoption', methods: "POST")]
    public function newSubscribeOption( SubscribeRepository $subscribeRepository,SubscribeOptionsRepository $optionsRepository, Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        if ($data){
            $subscribeOption = new SubscribeOption();
            $subscribeOption->setName($data['name']);
            $subscribeOption->setPrice($data['price']);
            $subscribeOption->setSubscribe($subscribeRepository->find($data['subscribeId']));

            $optionsRepository->save($subscribeOption, true);
            return  new  JsonResponse(["message"=>"Success", "status"=>"200", "data"=>$subscribeOption]);

        }else return  new  JsonResponse(["message"=>"Error while saving data.", "status"=>"500",]);

    }

    #[Route('/newterm', name: 'app_subscribe_newterm', methods: "POST")]
    public function newSubscribeTerm( SubscribeRepository $subscribeRepository,SubscribeTermRepository $termRepository, Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        if ($data){
            $subscribeTerm = new SubscribeTerm();

            $subscribeTerm->setTerm($data['term']);
            $subscribeTerm->setDiscountAmount($data['discount']);
            $subscribeTerm->setSubscribe($subscribeRepository->find($data['subscribeId']));

            $termRepository->save($subscribeTerm, true);
            return  new  JsonResponse(["message"=>"Success", "status"=>"200", "data"=>$subscribeTerm]);

        }else return  new  JsonResponse(["message"=>"Error while saving data.", "status"=>"500",]);
    }

    /*GET DATA*/
    #[Route('/all', name: 'app_subscribe_getall', methods: "GET")]
    public function getAllSubscribe(SubscribeRepository $subscribeRepository): JsonResponse
    {
        return new JsonResponse($subscribeRepository->findAll());
    }

    #[Route('/options/{id}', name: 'app_subscribe_getoptions', methods: "GET")]
    public function getOptionsBySubscribe(Request $request, SubscribeOptionsRepository $optionsRepository, SubscribeRepository $subscribeRepository): JsonResponse
    {
        $id = $request->get("id");
        return new JsonResponse($optionsRepository->findBy(['subscribe'=>$subscribeRepository->find($id)]));
    }
    #[Route('/terms/{id}', name: 'app_subscribe_getterm', methods: "GET")]
    public function getTermsBySubscribe(Request $request,SubscribeTermRepository $termRepository, SubscribeRepository $subscribeRepository ): JsonResponse
    {
        $id = $request->get("id");
        return new JsonResponse($termRepository->findBy(['subscribe'=>$subscribeRepository->find($id)]));
    }
}
