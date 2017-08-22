<?php

namespace App\Front;

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
                'options' => [
                    'label' => 'Person',
                ],
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
        ];
    }
}
