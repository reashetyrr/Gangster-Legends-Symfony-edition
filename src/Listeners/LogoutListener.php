<?php
namespace App\Listeners;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Logout\LogoutHandlerInterface;

class LogoutListener implements LogoutHandlerInterface {
    private $entityManager;

    public function __construct(EntityManagerInterface $userManager){
        $this->entityManager = $userManager;
    }

    public function logout(Request $Request, Response $Response, TokenInterface $Token) {
        $user = $Token->getUser();
        $user->setOnlineStatus(false);
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
}
