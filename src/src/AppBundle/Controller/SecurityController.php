<?php

namespace AppBundle\Controller;

use AppBundle\Form\LoginForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use FOS\RestBundle\Controller\Annotations\Route;

class SecurityController extends Controller {
    /**
     * @Route("/login", name="security_login")
     */
    public function loginAction() {

        $authenticationUtils = $this->get('security.authentication_utils');

        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();

        $form = $this->createForm(LoginForm::class, [
            '_username' => $lastUsername
        ]);
        return $this->render(
            'security/login.html.twig',
            array (
                'form' => $form->createView(),
                'error'         => $error,
            )
        );

    }
}
