<?php

namespace App\Factory\View\Helper;

use App\Form\Element\Select2;
use App\View\Helper\Select2FormElement;
use Interop\Container\ContainerInterface;
use Zend\Form\View\Helper\FormElement;
use Zend\ServiceManager\Factory\DelegatorFactoryInterface;

final class FormElementPluginRegistration implements DelegatorFactoryInterface
{
    private $pluginMap = [
        Select2::class => Select2FormElement::class,
    ];

    public function __invoke(ContainerInterface $container, $name, callable $callback, array $options = null)
    {
        $viewHelper = $callback();

        if (!$viewHelper instanceof FormElement) {
            throw new \BadMethodCallException('Expected ' . FormElement::class);
        }

        foreach ($this->pluginMap as $elementClass => $pluginClass) {
            $viewHelper->addClass($elementClass, $pluginClass);
        }

        return $viewHelper;
    }
}
