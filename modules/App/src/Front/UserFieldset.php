<?php

namespace App\Front;

use App\Form\Element\Select2;
use Zend\Form\Fieldset;

final class UserFieldset extends Fieldset
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
}
