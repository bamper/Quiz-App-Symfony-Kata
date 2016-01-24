<?php

namespace KataBundle\Form;

use KataBundle\Entity\Adress;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints as Assert;

class AdressSelectType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('adress', 'entity', [
                'label' => false,
                'class' => Adress::class,
                'required' => true,
                'expanded' => false,
                'multiple' => false,
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => "Musisz podać adres"
                    ])
                ]
            ]);
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'class' => 'KataBundle\Entity\Adress'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'kata_adress_select';
    }
}
