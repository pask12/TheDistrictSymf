<?php

namespace App\Controller;



use App\Form\ContactFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;


class ContactController extends AbstractController
{

    #[Route('/contact', name: 'app_contact', )]
    #[IsGranted("ROLE_CLIENT")] 
    public function mail(Request $request,MailerInterface $mailer)
    {
        $form = $this->createForm(ContactFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            //dd($data);
            $email = (new Email())
            ->to('info@thedistrict.com')
            ->from($data->getEmail())
            ->subject('demande de contact')
            ->text($data->getDemande());

            $mailer->send($email);

            // $email = (new Email())
            // ->from($address)
            // ->to('info@thedistrict.com')
            // ->subject('demande de contact')
            // ->text($content);
            
            return $this->redirectToRoute('app_accueil');
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
