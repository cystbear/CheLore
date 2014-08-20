<?php

namespace Che\CheLoreBundle\Admin;

use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

use Che\CheLoreBundle\Admin\BaseAdmin;

class CourseAdmin extends BaseAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', 'text')
            ->add('teachers', 'document', array(
                'class' => 'Che\CheLoreBundle\Document\User',
                'multiple' => true,
                'expanded'  => true,
                'required' => false,
            ))

            ->add('tests', 'document', array(
                'class' => 'Che\CheLoreBundle\Document\Test',
                'multiple' => true,
                'expanded'  => true,
                'required' => false,
            ))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('teachers')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
    }
}
