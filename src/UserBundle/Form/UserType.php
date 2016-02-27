<?php

namespace UserBundle\Form;

use ProductBundle\Form\ProductType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstName',TextType::class)
                ->add('lastName',TextType::class)
                ->add('products',CollectionType::class,['entry_type'=>ProductType::class]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class'=>'UserBundle\Entity\User']);
    }

    public function getName()
    {
        return 'user';
    }
}