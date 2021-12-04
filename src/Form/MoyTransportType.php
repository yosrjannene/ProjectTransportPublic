<?php

namespace App\Form;

use App\Entity\MoyTransport;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Component\Form\Extension\Core\Type\PasswordType;

use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
class MoyTransportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('price')
            ->add('name')
            ->add('picture')

            ->add('villeArrive', ChoiceType::class, [
                'choices'  => [

                    'Ariana' => "Ariana",
                    'Béja' => "Béja",
                    'Ben Arous' => "Ben Arous",
                    'Bizerte' => "Bizerte",
                    'Gabès' => "Gabès",
                    'Gafsa' => "Gafsa",
                    'Jendouba' => "Jendouba",
                    'Kairouan' => "Kairouan",
                    'Kasserine' => "Kasserine",
                    'Kébili' => "Kébili",
                    'Kef' => "Kef",
                    'Mahdia' => "Mahdia",
                    'Manouba' => "Manouba",
                    'Médenine' => "Médenine",
                    'Monastir' => "Monastir",
                    'Sfax' => "Sfax",
                    'Sidi Bouzid' => "Sidi Bouzid",
                    'Siliana' => "Siliana",
                    'Sousse' => "Sousse",
                    'Tataouine' => "Tataouine",
                    'Tozeur' => "Tozeur",
                    'Tunis' => "Tunis",
                    'Zaghouan' => "Zaghouan",

                ],
            ])

            ->add('villeDepart', ChoiceType::class, [
                'choices'  => [

                    'Ariana' => "Ariana",
                    'Béja' => "Béja",
                    'Ben Arous' => "Ben Arous",
                    'Bizerte' => "Bizerte",
                    'Gabès' => "Gabès",
                    'Gafsa' => "Gafsa",
                    'Jendouba' => "Jendouba",
                    'Kairouan' => "Kairouan",
                    'Kasserine' => "Kasserine",
                    'Kébili' => "Kébili",
                    'Kef' => "Kef",
                    'Mahdia' => "Mahdia",
                    'Manouba' => "Manouba",
                    'Médenine' => "Médenine",
                    'Monastir' => "Monastir",
                    'Sfax' => "Sfax",
                    'Sidi Bouzid' => "Sidi Bouzid",
                    'Siliana' => "Siliana",
                    'Sousse' => "Sousse",
                    'Tataouine' => "Tataouine",
                    'Tozeur' => "Tozeur",
                    'Tunis' => "Tunis",
                    'Zaghouan' => "Zaghouan",

                ],
            ])
            ->add('Description')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MoyTransport::class,
        ]);
    }
}
