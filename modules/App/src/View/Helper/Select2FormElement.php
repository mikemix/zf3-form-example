<?php

namespace App\View\Helper;

use App\Form\Element\Select2;
use Zend\Form\View\Helper\FormSelect;
use Zend\View\Helper\AbstractHelper;
use Zend\View\Helper\InlineScript;

final class Select2FormElement extends AbstractHelper
{
    private $inlineScript;
    private $formSelect;

    public function __construct(InlineScript $inlineScript, FormSelect $formSelect)
    {
        $this->inlineScript = $inlineScript;
        $this->formSelect = $formSelect;
    }

    public function __invoke(Select2 $element)
    {
        $this->inlineScript->appendScript($this->initializeScriptBody($element->getName()));

        return $this->formSelect->render($element);
    }

    private function initializeScriptBody(string $elementName): string
    {
        return '$("[name=\''. htmlentities($elementName) .'\']").select2()';
    }
}
