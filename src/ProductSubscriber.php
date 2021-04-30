<?php


namespace App;


use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Security;

class ProductSubscriber implements EventSubscriberInterface
{
    private Security $security;
public function __construct(Security $security)
{
$this->security=$security;
}

    public static function getSubscribedEvents()
    {
      return[
          BeforeEntityPersistedEvent::class=>['setPublisher']
      ];
    }


    public function setPublisher(BeforeEntityPersistedEvent $event)
    {
    $entity = $event->getEntityInstance();
    if($entity instanceof Product){
        $entity->setPublisher($this->security->getUser());
    }
    }
}