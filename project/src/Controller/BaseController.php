<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;

/**
 * @method  User getUser()
 */
abstract class BaseController extends AbstractController
{

}