<?php

namespace AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class UsersAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('email', 'text', array('label' => 'User email'))
            ->add('pass', 'text', array('data' => 'NULL'))
             //if no type is specified, SonataAdminBundle tries to guess it
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('email')

        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('email')
            ->add('_action', 'actions',array(
                'actions' => array(
                    'Sendemail' => array(
                        'template' => 'AdminBundle:UserAdmin:list__action_sendemail.html.twig'
                    )
                )
            ))

        ;
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('sendemail', $this->getRouterIdParameter().'/sendemail');
    }
}