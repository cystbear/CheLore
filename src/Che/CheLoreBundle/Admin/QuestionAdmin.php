<?php

namespace Che\CheLoreBundle\Admin;

use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

use Che\CheLoreBundle\Form\AnswerType;
use Che\CheLoreBundle\Admin\BaseAdmin;

class QuestionAdmin extends BaseAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('subject', 'textarea')

//            ->add('answers', 'sonata_type_collection',
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
//
            ->add('answers', 'collection', array(
                'type'         => new AnswerType(),
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

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('subject')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('subject')
        ;
    }
}
