<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class ContactController extends AbstractController
{
    /**
     * @Route("/nous-contacter", name="contact")
     */
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $contactFormData = $form->getData();

            $message = (new Email())
            ->from($contactFormData['email'])
            ->to('matthieubrenne2103@gmail.com')
            ->subject('contact client')
            ->text('expéditeur : '.$contactFormData['email'].\PHP_EOL.
                $contactFormData['message'],
                'text/plain');
            $mailer->send($message);

            $this->addFlash('notice', 'Merci de nous avoir contacté. Notre équipe va vous répondre dans les meilleurs délais.');



        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
