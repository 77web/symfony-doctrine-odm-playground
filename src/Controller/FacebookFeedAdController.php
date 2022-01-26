<?php

namespace App\Controller;

use App\Document\FacebookFeedAd;
use App\Form\FacebookFeedAdType;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;

class FacebookFeedAdController extends AbstractController
{
    #[Route('/facebook/feed/ad', name: 'facebook_feed_ad', methods: ['POST', 'GET'])]
    public function create(Request $request, FormFactoryInterface $formFactory, DocumentManager $dm, RouterInterface $router): Response
    {
        $form = $formFactory->createNamed('', FacebookFeedAdType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $dm->persist($data);
            $dm->flush();

            return new RedirectResponse($router->generate('facebook_feed_ad_show', ['id' => $data->getId()]));
        }

        return $this->render('facebook_feed_ad/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/facebook/feed/ad/{id}', name: 'facebook_feed_ad_show', methods: ['GET'])]
    public function show(FacebookFeedAd $data): Response
    {
        return $this->render('facebook_feed_ad/show.html.twig', [
            'ad' => $data,
        ]);
    }
}
