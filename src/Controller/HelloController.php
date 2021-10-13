<?php

namespace App\Controller;

use App\Form\HelloForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{

    /**
     * @Route("/")
     */
    public function redirectToForm(): Response
    {
        return new RedirectResponse(
            $this->generateUrl("app_hello_form"));
    }
    
    /**
     * @Route("/form")
     */
    public function form(Request $request): Response
    {
        $form = $this->createForm(HelloForm::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            dd($form->getData());
        }

        return $this->render(
            'form.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }
}
