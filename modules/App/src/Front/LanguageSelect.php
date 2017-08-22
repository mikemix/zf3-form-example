<?php

namespace App\Front;

use Zend\Form\Element\Select;

final class LanguageSelect extends Select
{
    public function init()
    {
        $this->setEmptyOption('Select language');
    }
}
