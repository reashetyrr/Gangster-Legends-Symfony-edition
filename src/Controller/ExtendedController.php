<?php


namespace App\Controller;


use App\Entity\Setting;
use App\Entity\Theme;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExtendedController extends AbstractController
{
    public function renderTemplate($view, $parameters = [], $response = null) {
        $request = $this->container->get('request_stack');
        $routeName = ucfirst($request->getCurrentRequest()->get('_route'));

        $em = $this->getDoctrine()->getManager();
        $users = count($em->getRepository(User::class)->findAll());
        $online_users = count($em->getRepository(User::class)->findBy(['online_status' => 1]));
        $game_name = 'test';
        try {
            $game_name = $em->getRepository(Setting::class)->findOneByType('game_name')->getContent();
        } catch (\Exception $exception) {
            // no game_name set, this is not an issue
        }

        $_theme = 'default';
        try {
            $_theme = $em->getRepository(Setting::class)->findOneByType('_theme')->getContent();
            $_theme = $em->getRepository(Theme::class)->findOneByName($_theme);
        } catch (\Exception $exception) {
            // no game_name set, this is not an issue
            dump($exception->getMessage());
        }

        $parameters['page'] = $routeName;
        $parameters['game_name'] = $game_name;
        $parameters['_theme'] = $_theme;
        $parameters['registeredUsers'] = $users;
        $parameters['usersOnlineNow'] = $online_users;

        dump($view);

        return $this->render($_theme->getTemplate($view), $parameters, $response);
    }
}