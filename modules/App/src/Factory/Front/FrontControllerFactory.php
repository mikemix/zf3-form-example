<?php

namespace App\Factory\Front;

use App\Front\FrontController;
use App\Front\IntroductionForm;
use Psr\Container\ContainerInterface;

final class FrontControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        /** @var ContainerInterface $formElementManager */
        $formElementManager = $container->get('FormElementManager');

        return new FrontController($formElementManager->get(IntroductionForm::class));
    }
}