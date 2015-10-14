<?php

namespace AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class EmailAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {


        $formMapper
            ->add('template', 'textarea', array('label' => 'Treść emaila (dostępne znaczniki {{haslo}}, {{dzien_start}}, {{dzien_stop}}, {{godzina_start}}, {{godzina_stop}})'))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {

    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {

        $listMapper
            ->addIdentifier('id')
            ->addIdentifier('content', 'text', array('label' => 'Treść pytania'))
        ;
    }
}