<?php

namespace AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class QuizsetAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('dateStart', 'datetime', array('label' => 'Data i godzina rozpoczęcia'))
            ->add('dateEnd', 'datetime', array('label' => 'Data i godzina zakończenia'))

        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('dateStart','doctrine_orm_datetime', array('label' => 'Data startu'))
            ->add('dateEnd', 'doctrine_orm_datetime', array('label' => 'Data końca'))
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {

        $listMapper
            ->addIdentifier('dateStart', 'date', array('label' => 'Data i godzina rozpoczęcia', 'format' => 'Y-m-d H:i'))
            ->addIdentifier('dateEnd', 'date', array('label' => 'Data i godzina zakończenia', 'format' => 'Y-m-d H:i'))
            ->add('_action', 'actions',array(
                'actions' => array(
                    'Sendemail' => array(
                        'template' => 'AdminBundle:QuizsetAdmin:list__action_sendemail.html.twig'
                    ),
                    'AddQuestion' => array(
                        'template' => 'AdminBundle:QuizsetAdmin:list__action_addquestion.html.twig'
                    ),
                    'GetWinners' => array(
                        'template' => 'AdminBundle:QuizsetAdmin:list__action_getwinners.html.twig'
                    )
                )
            ))
        ;
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('sendemail', $this->getRouterIdParameter().'/sendemail');
        $collection->add('getwinners', $this->getRouterIdParameter().'/getwinners');
    }
}