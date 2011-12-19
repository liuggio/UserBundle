<?php

namespace Tvision\Bundles\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Tvision\Bundles\UserBundle\Entity\User;

class FOSUserFixtures implements FixtureInterface, ContainerAwareInterface
{

    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load($em)
    {
        $user = new User();
        $user->setUsername('john');
        $encoder = $this->container->get('security.encoder_factory')->getEncoder($user);
        $user->setPassword($encoder->encodePassword('doe', $user->getSalt()));
        $user->setEmail('john@doe.com');
        $user->setEnabled(true);

        $em->persist($user);

        $em->flush();
    }
}
