<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserProdType extends AbstractType
{
    private $formVersion;

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('product','entity', [
                'data_class' => null, //'AppBundle\Entity\UserProd',
                'class' => 'AppBundle\Entity\FormProd',
                'expanded' => true,
                'multiple' => true,
                'mapped'   => false
            ])
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\UserProd'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_userprod';
    }
}
