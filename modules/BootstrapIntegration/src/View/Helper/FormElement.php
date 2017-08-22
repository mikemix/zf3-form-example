<?php

namespace BootstrapIntegration\View\Helper;

use Zend\Form\Element\Email;
use Zend\Form\Element\Text;
use Zend\Form\ElementInterface;

final class FormElement extends \Zend\Form\View\Helper\FormElement
{
    public function render(ElementInterface $element)
    {
        $element
            ->setAttribute('class', trim($element->getAttribute('class') . ' form-control'))
            ->setAttribute('id', $element->getAttribute('id') ?: 'element_' . md5(uniqid(microtime(), true)));

        if ($element->getLabel() && empty($element->getAttribute('placeholder') &&
            ($element instanceof Text || $element instanceof Email))
        ) {
            $element->setAttribute('placeholder', $element->getLabel());
        }

        return parent::render($element);
    }
}
