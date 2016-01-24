<?php
/**
 * Created by PhpStorm.
 * User: red
 * Date: 24.01.16
 * Time: 21:16
 */

namespace KataBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FieldsetType extends AbstractType {

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'inherit_data' => true,
            'label_attr' => [
                'class' => 'title -l form__title'
            ],
            'data_id' => false
        ]);
    }
    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'fieldset_type';
    }
    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        parent::buildView($view, $form, $options);
        $view->vars['data_id'] = $options['data_id'];
    }
}