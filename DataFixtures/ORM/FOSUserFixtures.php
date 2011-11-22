<?php

namespace Tvision\Bundles\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Tvision\Bundles\UserBundle\Entity\User;

class FOSUserFixtures implements FixtureInterface
{
    public function load($em)
    {
        $user = new User();
        $user->setUsername('john');
        $user->setPlainPassword('doe');
        $user->setEmail('john@doe.com');
        $user->setAlgorithm('sha512');
        $user->setEnabled(true);

        $em->persist($user);

        $em->flush();
    }
}