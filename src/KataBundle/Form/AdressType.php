<?php

namespace KataBundle\Form;

use KataBundle\Entity\Adress;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints as Assert;

class AdressType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('street', 'text', [
                'required' => true,
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => "Musisz podać adres"
                    ])
                ]
            ]);
        $builder->add('submit', 'submit');
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KataBundle\Entity\Adress',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'adress';
    }
}
