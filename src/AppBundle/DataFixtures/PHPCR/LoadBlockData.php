<?php
namespace AppBundle\DataFixtures\PHPCR;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use mssimi\ContentManagementBundle\Document\Block;

class LoadBlockData implements FixtureInterface
{
    public function load(ObjectManager $dm)
    {
        $root = $dm->find(null, 'cms/block');

        $block1 = new Block();
        $block1->setParent($root);
        $block1->setName('block1');
        $block1->setContent('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

        $block2 = clone $block1;
        $block2->setName('block2');

        $block3 = clone $block1;
        $block3->setName('block3');

        $dm->persist($block1);
        $dm->persist($block2);
        $dm->persist($block3);

        $dm->flush();
    }
}