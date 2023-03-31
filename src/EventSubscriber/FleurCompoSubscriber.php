<?php
namespace App\EventSubscriber;

use App\Entity\Fleur;

use App\Entity\BlogPost;
use App\Entity\FleurCompo;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;

class FleurCompoSubscriber implements EventSubscriberInterface
{
    

    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['setPrix'],
        ];
    }

    public function setPrix(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof FleurCompo)) {
            return;
        }

        
        $entity->setPrix($entity->getFleur()->getPrix());
    }
}