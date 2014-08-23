<?php

namespace Che\CheLoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class QuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('subject', 'text', ['attr' => ['style' => 'width: 500px']])
            ->add('answers', 'sonata_type_native_collection', array(
                'type'         => new AnswerType(),
                'label' => false,
                'options' => array(
                    'label_attr' => array(
                        'class' => 'hide-me'
                    ),
                ),
                'attr' => ['style' => 'margin-left: 40px', 'class' => 'answers-group'],
                'allow_add'    => true,
                'allow_delete' => true,
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Che\CheLoreBundle\Document\Question',
        ));
    }

    public function getName()
    {
        return 'answer';
    }
}
