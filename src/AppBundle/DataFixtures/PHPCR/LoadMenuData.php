<?php
namespace AppBundle\DataFixtures\PHPCR;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use mssimi\ContentManagementBundle\Document\Menu;

class LoadMenuData implements FixtureInterface
{
    public function load(ObjectManager $dm)
    {
        $root = $dm->find(null, 'cms/menu');

        $menu1 = new Menu();
        $menu1->setParent($root);
        $menu1->setName('main-menu');

        $menu2 = clone $menu1;
        $menu2->setName('footer-menu-1');

        $menu3 = clone $menu1;
        $menu3->setName('footer-menu-2');

        $dm->persist($menu1);
        $dm->persist($menu2);
        $dm->persist($menu3);

        $dm->flush();
    }
}