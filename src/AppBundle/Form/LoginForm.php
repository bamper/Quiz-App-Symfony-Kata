<?php
/**
 * Created by PhpStorm.
 * User: red
 * Date: 28.09.15
 * Time: 21:16
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class LoginForm extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add('email', 'email')
            ->add('pass' , 'password')
            ->add('login', 'submit');
    }

    public function getName(){
        return "loginform";
    }
} 