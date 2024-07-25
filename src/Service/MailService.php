<?php

namespace App\Service;

use App\Entity\Commande;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Doctrine\ORM\Mapping as ORM;

class MailService
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendCommande(
        string $from,
        string $to,
        Commande $commande
    ): void {
        //on créé l'email

        $emailContent=$this->generateOrderDetailsContent($commande);

        $email = (new TemplatedEmail())
            ->from($from)
            ->to($to)
            ->subject('Confirmation commande')
            ->html($emailContent);
        $this->mailer->send($email);
    }


    private function generateOrderDetailsContent(Commande $commande)
    {
        $content = "<h1> Détails de la commande " . $commande->getId(). "</h1>";
        $content .= "<ul>";

        foreach ($commande->getDetails() as $item) {
            $content .= sprintf("<li>%s - %d€</li>", $item->getPlat(), $item->getQuantite());
        }
        $content .= "</ul>";
        $content .= sprintf("<p>Total : %d€ </p>", $commande->getTotal());

    }
}
