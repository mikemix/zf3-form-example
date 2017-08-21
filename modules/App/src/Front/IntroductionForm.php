<?php

namespace App\Front;

use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;

final class IntroductionForm extends Form implements InputFilterProviderInterface
{
    public function init()
    {
        $this
            ->add([
                'name' => 'user',
                'type' => UserFieldset::class,
                'options' => [
                    'use_as_base_fieldset' => true,
                ],
            ])
            ->add([
                'name' => 'csrf',
                'type' => 'csrf',
            ]);
    }

    public function getInputFilterSpecification()
    {
        return [
            'csrf' => [
                'required' => true,
                // csrf element adds its own validators
            ],
        ];
    }
}