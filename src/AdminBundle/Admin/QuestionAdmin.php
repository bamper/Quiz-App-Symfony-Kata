<?php

namespace AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class QuestionAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {


        $formMapper
            ->add('quizset','sonata_type_model', array('btn_add' => false))
            ->add('content', 'text', array('label' => 'Pytanie'))
            ->add('ans_1', 'text', array('label' => 'Odpowiedź 1'))
            ->add('ans_2', 'text', array('label' => 'Odpowiedź 2'))
            ->add('ans_3', 'text', array('label' => 'Odpowiedź 3'))
            ->add('correct', 'number', array('label' => 'Numer poprawnej odpowiedzi'))
            ->add('type', 'choice', array('choices' => array('radio' => 'Jedna odpowiedź', 'checkbox' => 'Wielokrotna odpowiedź', 'textarea' => 'Otwarte pytanie'), 'label' => 'Typ pytania'))

        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
              ->add('quizset')
              ->add('content')
              ->add('type')
        ;
        //    ->add('quizset','many_to_one', array())
        //    ->add('dateStart','doctrine_orm_datetime', array('label' => 'Data startu'))
        //    ->add('dateEnd', 'doctrine_orm_datetime', array('label' => 'Data końca'))
        //;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {

        $listMapper
            ->add('quizset','many_to_one', array())
            ->addIdentifier('content', 'text', array('label' => 'Treść pytania'))
            ->addIdentifier('ans_1', 'text', array('label' => 'Odpowiedź 1'))
            ->addIdentifier('ans_2', 'text', array('label' => 'Odpowiedź 2'))
            ->addIdentifier('ans_3', 'text', array('label' => 'Odpowiedź 3'))
            ->add('correct', 'text', array('label' => 'Odpowiedź 3'))
            ->add('type', 'text', array('label' => 'Typ pola'))

        ;
    }
}