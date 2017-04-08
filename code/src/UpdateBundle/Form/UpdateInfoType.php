<?php

namespace UpdateBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UpdateInfoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('version')->add('channel')->add('type')->add('status')->add('forceExec')->add("needRestart")->add('message')->add('resVersion')->add('resourceUrl')->add('resourceSuffix')->add('resourceMd5')->add('resourceSize');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UpdateBundle\Entity\UpdateInfo'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'updatebundle_updateinfo';
    }


}
