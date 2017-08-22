<?php

namespace App\Factory\View\Helper;

use App\View\Helper\Select2FormElement;
use Psr\Container\ContainerInterface;
use Zend\Form\View\Helper\FormSelect;
use Zend\View\Helper\InlineScript;
use Zend\View\HelperPluginManager;

final class Select2FormElementFactory
{
    public function __invoke(ContainerInterface $container)
    {
        /** @var HelperPluginManager $viewHelperManager */
        $viewHelperManager = $container->get('ViewHelperManager');

        return new Select2FormElement(
            $viewHelperManager->get(InlineScript::class),
            $viewHelperManager->get(FormSelect::class)
        );
    }
}
