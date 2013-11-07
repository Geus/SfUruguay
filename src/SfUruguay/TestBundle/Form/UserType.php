<?php

namespace SfUruguay\TestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('email')
            ->add('avatar', 'file')
            ->add('birthday', 'birthday')
            ->add('group', 'entity', array(
                'class' => 'SfUruguay\TestBundle\Entity\UserGroup'
            ))

        ;
        /*
        // El segundo parametro es el tipo. Si no tiene, toma el por defecto
        $builder->addEventListener(FormEvents::POST_SET_DATA, function(FormEvent $event){
            $user = $event->getData(); // Retorna el modelo
            if (!$user->isAdmin()){
                $event->getForm()->remove('email'); // No se le va a mostrar el email si no es admin.
            }
        });
        */
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SfUruguay\TestBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sfuruguay_testbundle_user';
    }
}
