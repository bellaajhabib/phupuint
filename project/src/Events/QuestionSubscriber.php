<?php

namespace App\Events;

use App\Kernel;
use Doctrine\Common\EventSubscriber;
use Doctrine\Migrations\EventDispatcher;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Command\EventDispatcherDebugCommand;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\KernelEvent;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use ApiPlatform\Core\EventListener\EventPriorities;
use Symfony\Contracts\EventDispatcher\Event;

class QuestionSubscriber implements EventSubscriberInterface
{
    private LoggerInterface $logger;

    public  function __construct (LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public static function getSubscribedEvents(): array
    {
     return [
        RequestEvent::class=> 'onKernelRequest'
     ];
    }
    public function onKernelRequest()
    {
        $this->logger->info('I\'m loogin SUPER early on the request');
    }
}