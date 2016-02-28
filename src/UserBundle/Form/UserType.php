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
                ->add('products',CollectionType::class,
                    [
                        'label'=>false,
                        'entry_type'=>ProductType::class,
                        'allow_add'=>true, //adding prototype variable to render any new product
                        'by_reference'=>false, //adding this to use addProduct instead of setProduct and addUser in Product Entity

                    ]);
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