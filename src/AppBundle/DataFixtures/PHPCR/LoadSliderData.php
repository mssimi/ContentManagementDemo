<?php
namespace AppBundle\DataFixtures\PHPCR;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use mssimi\ContentManagementBundle\Document\Slider;

class LoadSliderData implements FixtureInterface
{
    public function load(ObjectManager $dm)
    {
        $root = $dm->find(null, 'cms/slider');

        $slider = new Slider();
        $slider->setParent($root);
        $slider->setName('slider1');

        $dm->persist($slider);

        $dm->flush();
    }
}