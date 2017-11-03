<?php
/**
 * Created by PhpStorm.
 * User: jzawadzki
 * Date: 03.11.17
 * Time: 20:02
 */

namespace AppBundle\Foo;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;

class Foo implements EventSubscriberInterface
{
    /**
     * @var \Swift_Mailer
     */
    private $mailer;
    /**
     * @var string
     */
    private $foo;

    public function __construct(\Swift_Mailer $mailer, string $foo)
    {
        $this->mailer = $mailer;
        $this->foo = $foo;
    }

    public function foo() {
        return $this->foo;
    }

    public static function getSubscribedEvents()
    {
       return [KernelEvents::RESPONSE => array(
           array('onKernelResponsePre', 10),
       ),];
    }

    public function onKernelResponsePre() {
        dump($this->foo);
    }


}