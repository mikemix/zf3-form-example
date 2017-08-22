<?php

namespace BootstrapIntegration\View\Helper;

use Zend\Form\ElementInterface;

final class FormElement extends \Zend\Form\View\Helper\FormElement
{
    public function render(ElementInterface $element)
    {
        $element
            ->setAttribute('class', trim($element->getAttribute('class') . ' form-control'))
            ->setAttribute('id', $element->getAttribute('id') ?: 'element_' . md5(uniqid(microtime(), true)));

        return parent::render($element);
    }
}
