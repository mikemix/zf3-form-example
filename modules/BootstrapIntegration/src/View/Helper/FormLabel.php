<?php

namespace BootstrapIntegration\View\Helper;

final class FormLabel extends \Zend\Form\View\Helper\FormLabel
{
    public function openTag($attributesOrElement = null)
    {
        return '<label class="control-label">';
    }

    public function closeTag()
    {
        return '</label>';
    }
}
