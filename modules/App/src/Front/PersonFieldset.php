<?php

namespace App\Front;

use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Validator\StringLength;

final class PersonFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function init()
    {
        $this
            ->add([
                'name' => 'firstName',
                'type' => 'text',
                'options' => [
                    'label' => 'First name',
                ],
            ])
            ->add([
                'name' => 'lastName',
                'type' => 'text',
                'options' => [
                    'label' => 'Last name',
                ],
            ])
        ;
    }

    public function getInputFilterSpecification()
    {
        return [
            'firstName' => [
                'required' => true,
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                ],
                'validators' => [
                    ['name' => StringLength::class, 'options' => ['min' => 2, 'max' => 100]],
                ],
            ],
            'lastName' => [
                'required' => true,
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                ],
                'validators' => [
                    ['name' => StringLength::class, 'options' => ['min' => 2, 'max' => 100]],
                ],
            ],
        ];
    }
}