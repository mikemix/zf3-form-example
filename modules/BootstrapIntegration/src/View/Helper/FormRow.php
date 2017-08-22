<?php

namespace BootstrapIntegration\View\Helper;

use Zend\Form\ElementInterface;

final class FormRow extends \Zend\Form\View\Helper\FormRow
{
    public function render(ElementInterface $element, $labelPosition = null)
    {
        $class = 'form-group' . (count($element->getMessages()) ? ' has-error' : '');

        return
            '<div class="' . $class . '">' .
            parent::render($element, $labelPosition) .
            '</div>';
    }

    protected function getElementHelper()
    {
        if (!$this->elementHelper) {
            $this->elementHelper = new FormElement();
            $this->elementHelper->setView($this->getView());
        }

        return $this->elementHelper;
    }

    protected function getLabelHelper()
    {
        if (!$this->labelHelper) {
            $this->labelHelper = new FormLabel();
            $this->labelHelper->setView($this->getView());
        }

        return $this->labelHelper;
    }

    protected function getElementErrorsHelper()
    {
        $helper = parent::getElementErrorsHelper();
        $helper->setMessageOpenFormat('<span class="help-block"><ul%s><li>');
        $helper->setMessageCloseString('</li></ul></span>');

        return $helper;
    }
}
