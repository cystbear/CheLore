<?php

namespace Che\CheLoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AnswerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('answer', 'text', array('label' => 'Answer', 'attr' => ['style' => 'width: 500px']    ))
            ->add('isCorrect', 'checkbox', array('required' => false, 'label' => 'Correct'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Che\CheLoreBundle\Document\Answer',
        ));
    }

    public function getName()
    {
        return 'answer';
    }
}
