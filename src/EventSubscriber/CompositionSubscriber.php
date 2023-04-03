<?php

namespace App\EventSubscriber;

use App\Entity\Fleur;

use App\Entity\BlogPost;
use App\Entity\FleurCompo;
use App\Entity\Composition;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;

class CompositionSubscriber implements EventSubscriberInterface
{

    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['setPrix'],
        ];
    }

    public function setPrix(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance(); // composition
        if ($entity instanceof Composition) {


            foreach ($entity->getFleursCompo() as $fleurCompo) {
                $prix = $fleurCompo->getFleur()->getPrix();
                

                $fleurCompo->setPrix($prix);
            }
        } else {
            return;
        }
    }
}
