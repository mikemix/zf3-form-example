<?php

namespace App\Factory\Front;

use App\Front\LanguageSelect;

final class LanguageSelectFactory
{
    public function __invoke()
    {
        // could introduce lazy-loaded options in the select

        $select = new LanguageSelect();
        $select->setValueOptions([
            'dynamic' => 'Dynamic',
            'option' => 'Option',
        ]);

        return $select;
    }
}