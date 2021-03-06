<?php

namespace CCC\EmailTemplateBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EmailTemplateType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text', array(
                    'label' => 'ccc.email-template.title', 'translation_domain' => 'CCCEmailTemplate'
                )
            )
            ->add('template', 'textarea', array(
                'label' => 'ccc.email-template.template', 'translation_domain' => 'CCCEmailTemplate',
            ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CCC\EmailTemplateBundle\Entity\EmailTemplate'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'email_template_create';
    }
}
