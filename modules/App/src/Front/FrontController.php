<?php

namespace App\Front;

use Zend\Http\PhpEnvironment\Request;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

final class FrontController extends AbstractActionController
{
    private $form;

    public function __construct(IntroductionForm $form)
    {
        $this->form = $form;
    }

    public function indexAction(): ViewModel
    {
        /** @var Request $request */
        $request = $this->request;

        $view = new ViewModel();
        $view->setTemplate('app/front/index');
        $view->setVariable('form', $this->form);

        if ($request->isPost()) {
            $this->form->setData($request->getPost());
            $this->form->isValid();
        }

        return $view;
    }
}