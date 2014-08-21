<?php

namespace Che\CheLoreBundle\Admin;

use Che\CheLoreBundle\Form\QuestionType;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

use Che\CheLoreBundle\Admin\BaseAdmin;

class TestAdmin extends BaseAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title')
            ->add('isActive', 'checkbox', array('required' => false))
//            ->add('questions', 'sonata_type_collection',
//                array(
//                    'label' => 'Questions',
//                    'by_reference' => false,
//                    'type' => 'sonata_type_admin',
//                ),
//                array(
//                    'edit' => 'inline',
//                    'inline' => 'table',
//                    'allow_delete' => true,
//                )
//            )
            ->add('questions', 'sonata_type_native_collection', array(
                'type'         => new QuestionType(),
                'options' => array(
                    'label_attr' => array(
                        'class' => 'hide-me'
                    ),
                ),
                'allow_add'    => true,
                'allow_delete' => true,
            ))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('isActive')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('isActive')
        ;
    }
}
