<?php
namespace AppBundle\DataFixtures\PHPCR;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use mssimi\ContentManagementBundle\Document\MenuItem;

class LoadMenuItemData implements FixtureInterface
{
    public function load(ObjectManager $dm)
    {
        // main menu
        $root = $dm->find(null, 'cms/menu/main-menu');

        $menuItem1 = new MenuItem();
        $menuItem1->setParent($root);
        $menuItem1->setLabel('News');
        $menuItem1->setLink('/cms/page/news');
        $menuItem1->setLinkType(MenuItem::linkTypePage);

        $menuItem2 = clone $menuItem1;
        $menuItem2->setLabel('Contact');
        $menuItem2->setLink('/cms/page/contact');

        $menuItem3 = clone $menuItem1;
        $menuItem3->setLabel('About');
        $menuItem3->setLink('/cms/page/about');

        $menuItem4 = clone $menuItem1;
        $menuItem4->setLabel('Login');
        $menuItem4->setLink('fos_user_security_login');
        $menuItem4->setLinkType(MenuItem::linkTypeRoute);

        $dm->persist($menuItem1);
        $dm->persist($menuItem2);
        $dm->persist($menuItem3);
        $dm->persist($menuItem4);

        // footer menu 1
        $root = $dm->find(null, 'cms/menu/footer-menu-1');

        $menuItem1 = clone $menuItem1;
        $menuItem1->setParent($root);

        $menuItem2 = clone $menuItem2;
        $menuItem2->setParent($root);

        $menuItem3 = clone $menuItem3;
        $menuItem3->setParent($root);

        $dm->persist($menuItem1);
        $dm->persist($menuItem2);
        $dm->persist($menuItem3);

        // footer menu 2
        $root = $dm->find(null, 'cms/menu/footer-menu-2');

        $menuItem1 = new MenuItem();
        $menuItem1->setParent($root);
        $menuItem1->setLabel('Google');
        $menuItem1->setLink('http://google.com');
        $menuItem1->setLinkType(MenuItem::linkTypeUrl);

        $menuItem2 = clone $menuItem1;
        $menuItem2->setLabel('Symfony');
        $menuItem2->setLink('http://symfony.com');

        $dm->persist($menuItem1);
        $dm->persist($menuItem2);

        $dm->flush();
    }
}