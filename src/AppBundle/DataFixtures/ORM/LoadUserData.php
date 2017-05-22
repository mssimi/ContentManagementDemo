<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\User;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $em)
    {
        $user = new User();
        $user->setUsername('admin');
        $user->setEmail('admin@admin.com');
        $user->setRoles(array('ROLE_ADMIN','ROLE_CMS'));
        $user->setEnabled(true);
        $user->setPlainPassword('admin');

        $em->persist($user);
        $em->flush();
    }
}