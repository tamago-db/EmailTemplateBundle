<?php

namespace CCC\EmailTemplateBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use CCC\EmailTemplateBundle\Form\Type\EmailTemplateSelectType;

/**
 * @todo Deprecate?
 */
class EmailTemplateSelectTestType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email_template', 'email_template_select', array(
                'required' => false,
                'label' => 'ccc.email-template.email',
                'translation_domain' => 'CCCEmailTemplate'
            ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'EmailTemplateSelectTest';
    }
}
