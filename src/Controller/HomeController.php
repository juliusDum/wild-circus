<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('Home/index.html.twig');
    }

    /**
     * @Route("/mentions-legales", name="mentions_legales")
     * @return Response
     */
    public function mentions_legales(): Response
    {
        return $this->render('Home/mentions_legales.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     * @param Request $request
     * @param MailerInterface $mailer
     * @return Response
     * @throws TransportExceptionInterface
     */
    public function contact(Request $request, MailerInterface $mailer) :Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $email = (new TemplatedEmail())
                ->from('jules.testphp@gmail.com')
                ->to('jules.testphp@gmail.com')
                ->subject($contact->getObject())
                ->htmlTemplate('Home/email/notification.html.twig')
                ->context(['contact' => $contact]);
            $mailer->send($email);
            $this->addFlash('success', 'Votre mail a bien été envoyé !');

            return $this->redirectToRoute('home');
        }

        return $this->render('Home/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}