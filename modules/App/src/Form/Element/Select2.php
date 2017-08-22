<?php

namespace App\Form\Element;

use Zend\Form\Element\Select;

final class Select2 extends Select
{
    const CLASS_NAME = 'select2';

    public function init()
    {
        $this->setAttribute('class', trim($this->getAttribute('class') . ' ' . self::CLASS_NAME));
    }
}
