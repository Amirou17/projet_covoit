<?php

namespace App\Form;

use App\Entity\SearchTrip;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchTripType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('CityDeparture', TextType::class, [
                'label' => false,
            ])
            ->add('cityDestination', TextType::class, [
                'label' => false,
            ])
            ->add('dateDeparture', DateType::class, [
                'label' => false,
            ])
            ->add('numberPlaces', ChoiceType::class, [
                'label' => false,
                'choices' => [
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                ]
            ])
            ->add('departureTime', TimeType::class, [
                'label' => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SearchTrip::class,
        ]);
    }
}
