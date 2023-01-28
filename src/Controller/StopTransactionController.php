<?php

namespace App\Controller;

use App\Message\PurchaseConfirmationNotification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class StopTransactionController extends AbstractController
{
    //buy
    #[Route('/buy', name: 'buy-stock')]
    public function buy(MessageBusInterface $bus): Response
    {
        //$notification->getOrder()->getBuyer()->getEmail()
        
        $order = new class {
            public function getBuyer():object
            {
                return new class {
                    public function getEmail(): string
                    {
                        return 'email.test@tech.com';
                    }
                };
            }
        };

        $bus->dispatch(new PurchaseConfirmationNotification($order));

        return $this->render('stocks/example.html.twig');

    }


    //sell
}