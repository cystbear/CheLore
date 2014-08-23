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
            ->with('Test Meta')
                ->add('title')
                ->add('isActive', 'checkbox', array('required' => false))
            ->end()
            ->with('Questions')
                ->add('questions', 'sonata_type_native_collection', array(
                    'type'         => new QuestionType(),
                    'allow_add'    => true,
                    'allow_delete' => true,
                ))
            ->end()
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
