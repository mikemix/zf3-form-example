<?php

namespace App\Front;

use App\Form\Element\Select2;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;

final class UserFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function init()
    {
        $this
            ->add([
                'name' => 'person',
                'type' => PersonFieldset::class,
            ])
            ->add([
                'name' => 'email',
                'type' => 'email',
                'options' => [
                    'label' => 'E-mail address',
                ],
            ])
            ->add([
                'name' => 'language',
                'type' => LanguageSelect::class,
                'options' => [
                    'label' => 'Language',
                ],
            ])
            ->add([
                'name' => 'sex',
                'type' => Select2::class,
                'options' => [
                    'label' => 'Sex',
                    'value_options' => [
                        'm' => 'Male',
                        'f' => 'Female',
                    ],
                ],
            ]);
    }

    public function getInputFilterSpecification()
    {
        return [
            // must not add specification of the fieldset elements
            // as those elements provide input filters by themselves
            'email' => [
                'required' => true,
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                ],
                // e-mail element adds its own address validator
                // so no additional validators are required
            ],
            'language' => [
                'required' => true,
                // select element validates the value against its value options by itself
            ],
            'sex' => [
                'required' => true,
            ],
        ];
    }
}
