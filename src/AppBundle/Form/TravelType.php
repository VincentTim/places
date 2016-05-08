<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use AppBundle\Form\TagType;

class TravelType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array(
                    'label' => 'Titre',
                    'required' => true
                )
            )
            ->add('period_from', 'text', array(
                    'label' => 'Date de début',
                    'attr' => array('class' => 'form__datepicker'),
                    'required' => true
                )
            )
            ->add('period_to', 'text', array(
                    'label' => 'Date de fin',
                    'attr' => array('class' => 'form__datepicker'),
                    'required' => true
                )
            )
            ->add('summary', 'textarea', array(
                    'label' => 'Résumé',
                    'required' => true
                )
            )
            ->add('description', 'textarea', array(
                    'label' => 'Description',
                    'attr' => array('class' => 'tinymce'),
                    'required' => true
                )
            )
            ->add('tags', 'collection', array(
                    'entry_type'   => new TagType(),
                    'allow_add'    => true,
					'options' => array(
						'label' => false
					)
                )
            )
            ->add('files', 'collection', array(
                    'entry_type'   => new FileType(),
                    'allow_add'    => true,
					'options' => array(
						'label' => false
					)
                )
            )//entity
            ->add('country', 'entity', array(
                'label' => 'Pays',
                'property' => 'name',
                'class' => 'AppBundle:Country',
                
            ))//entity
            ->add('save', 'submit', array('label'=> 'Enregistrer', 'attr' => array('class'=>'btn btn-success')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Travel'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_travel';
    }
}
