<?php

namespace ProductBundle\Form;

use CategoryBundle\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name',TextType::class)
                ->add('price',TextType::class)
                ->add('category',EntityType::class,['class'=>Category::class,'property'=>'name']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class'=>'ProductBundle\Entity\Product']);
    }

    public function getName()
    {
        return 'product';
    }
}