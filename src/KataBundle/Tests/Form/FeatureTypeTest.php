<?php
/**
 * Created by PhpStorm.
 * User: red
 * Date: 07.02.16
 * Time: 19:54
 */

namespace KataBundle\Tests\Form;


use Doctrine\Tests\Common\Persistence\TestObject;
use KataBundle\Entity\Cart;
use KataBundle\Form\CartType;
use Symfony\Component\Form\Test\TypeTestCase;

class FeatureTypeTest extends TypeTestCase
{
    public function testSubmitValidData()
    {
        $formData = [
            'name' => 'Radon',
            'date' => new \DateTime('NOW')
        ];

        $cartType = new CartType();
        $form = $this->factory->create($cartType);

        $object = new Cart();
        $object->setName('Radon');
        $object->setDate($formData['date']);

        $form->submit($formData);

        $this->assertTrue($form->isSynchronized());
        $this->assertEquals($object, $form->getData());

        $view = $form->createView();
        $children = $view->children;

        foreach (array_keys($formData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }

}