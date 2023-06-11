<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class UserController extends BaseController
{
    /**
     * @Route ("/api/me")
     * @IsGranted ("IS_AUTHENTICATED_REMEMBERED")
     */
     public function apiMe(){

         return $this->json($this->getUser(),200,[],[
             'groups' =>['user:read']
         ]);
     }
}