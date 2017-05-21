<?php
namespace AppBundle\DataFixtures\PHPCR;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use mssimi\ContentManagementBundle\Document\SliderImage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class LoadSliderImageData implements FixtureInterface
{
    public function load(ObjectManager $dm)
    {
        $root = $dm->find(null, 'cms/slider/slider1');

        $sliderImage1 = new SliderImage();
        $sliderImage1->setParent($root);

        copy($this->getPathname('slide1.jpg'),$this->getPathname('slide1_copy.jpg'));
        $image = new UploadedFile($this->getPathname('slide1_copy.jpg'), 'slide1.jpg', null,null, null, true);
        $sliderImage1->setImageFile($image);

        $sliderImage2 = clone $sliderImage1;
        copy($this->getPathname('slide2.jpg'),$this->getPathname('slide2_copy.jpg'));
        $image = new UploadedFile($this->getPathname('slide2_copy.jpg'), 'slide2.jpg', null,null, null, true);
        $sliderImage2->setImageFile($image);

        $sliderImage3 = clone $sliderImage1;
        copy($this->getPathname('slide3.jpg'),$this->getPathname('slide3_copy.jpg'));
        $image = new UploadedFile($this->getPathname('slide3_copy.jpg'), 'slide3.jpg', null,null, null, true);
        $sliderImage3->setImageFile($image);

        $dm->persist($sliderImage1);
        $dm->persist($sliderImage2);
        $dm->persist($sliderImage3);

        $dm->flush();
    }

    public function getAbsolutePath(){
        return __DIR__ . '/../../../../web/img/';
    }

    public function getPathname($fileName){
        return $this->getAbsolutePath() . $fileName;
    }
}