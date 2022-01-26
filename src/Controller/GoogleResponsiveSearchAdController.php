<?php

namespace App\Controller;

use App\Document\GoogleResponsiveSearchAd;
use App\Form\GoogleResponsiveSearchAdType;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;

class GoogleResponsiveSearchAdController extends AbstractController
{
    #[Route('/google/responsive_search/ad', name: 'google_responsive_search_ad', methods: ['POST', 'GET'])]
    public function create(Request $request, FormFactoryInterface $formFactory, DocumentManager $dm, RouterInterface $router): Response
    {
        $form = $formFactory->createNamed('', GoogleResponsiveSearchAdType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var GoogleResponsiveSearchAd $data */
            $data = $form->getData();
            $data->setRegisteredAt(new \DateTimeImmutable());
            $dm->persist($data);
            $dm->flush();

            return new RedirectResponse($router->generate('google_responsive_search_ad_show', ['id' => $data->getId()]));
        }

        return $this->render('google_responsive_search_ad/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/google/responsive_search/ad/{id}', name: 'google_responsive_search_ad_show', methods: ['GET'])]
    public function show(string $id, DocumentManager $dm): Response
    {
        $data = $dm->find(GoogleResponsiveSearchAd::class, $id);
        if (!$data) {
            throw new NotFoundHttpException();
        }

        return $this->render('google_responsive_search_ad/show.html.twig', [
            'ad' => $data,
        ]);
    }
}
