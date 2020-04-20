<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity;
use App\Form;

/**
 * Class AdminController
 * @package App\Controller
 * @Route("/a")
 * @IsGranted("ROLE_ADMIN")
 */
class AdminController extends ExtendedController
{
    /**
     * @Route("/", name="admin_dashboard")
     */
    public function index()
    {
        return $this->renderTemplate('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'loginPostfix' => null,
            'loginSuffix' => null,
            'alerts' => null,
            'game' => null
        ]);
    }

    /**
     * @Route("/init/module")
     */
    public function init_module() {
        $em = $this->getDoctrine()->getManager();
        $core_module = $em->getRepository(Entity\Module::class)->findOneByName('core');
        if (!$core_module) {
            $core_module = new Entity\Module();
            $core_module->setCreator('Gangster Legends');
            $core_module->setName('core');
            $core_module->setCanDisable(false);
            $core_module->setBundle('App');
            $core_module->setNamespace('App');
        }
        $core_module->setMenuStructure([
            'left' => [
                'account' => [
                    'label' => 'ACCOUNT',
                    '_type' => 'category',
                    '_permissions' => 'ROLE_USER',
                    'content' => [
                        'mail' => [
                            '_route' => 'mail',
                            'label' => 'Mail',
                            '_permissions' => 'ROLE_USER'
                        ],
                        'leaderboard' => [
                            '_route' => 'leaderboard',
                            'label' => 'Leaderboards',
                            '_permissions' => 'ROLE_USER'
                        ],
                        'news' => [
                            '_route' => 'news',
                            'label' => 'Game News',
                            '_permissions' => 'ROLE_USER'
                        ],
                        'online_users' => [
                            '_route' => 'online_users',
                            'label' => 'Online Users',
                            '_permissions' => 'ROLE_USER'
                        ],
                        'statistics' => [
                            '_route' => 'statistics',
                            'label' => 'Statistics',
                            '_permissions' => 'ROLE_USER'
                        ],
                        'profile' => [
                            '_route' => 'profile',
                            'label' => 'Profile',
                            '_permissions' => 'ROLE_USER'
                        ],
                        'logout' => [
                            '_route' => 'app_logout',
                            'label' => 'Logout',
                            '_permissions' => 'ROLE_USER'
                        ]
                    ]
                ],
                'actions' => [
                    'label' => 'ACTIONS',
                    '_type' => 'category',
                    '_permissions' => 'ROLE_USER',
                    'content' => [
                        'crimes' => [
                            '_route' => 'crimes',
                            'label' => 'Crimes',
                            '_permissions' => 'ROLE_USER'
                        ],
                        'gta' => [
                            '_route' => 'gta',
                            'label' => 'Car Theft',
                            '_permissions' => 'ROLE_USER'
                        ],
                        'pchase' => [
                            '_route' => 'pchase',
                            'label' => 'Police Chase',
                            '_permissions' => 'ROLE_USER'
                        ]
                    ]
                ],
                'city' => [
                    'label' => '{city_name}',
                    '_type' => 'category',
                    '_permissions' => 'ROLE_USER',
                    'content' => [
                        'bank' => [
                            '_route' => 'bank',
                            'label' => 'Bank',
                            '_permissions' => 'ROLE_USER'
                        ],
                        'bullet_factory' => [
                            '_route' => 'bullet_factory',
                            'label' => 'Bullet Factory',
                            '_permissions' => 'ROLE_USER'
                        ],
                        'garage' => [
                            '_route' => 'garage',
                            'label' => 'Garage',
                            '_permissions' => 'ROLE_USER'
                        ],
                        'jail' => [
                            '_route' => 'jail',
                            'label' => 'Jail',
                            '_permissions' => 'ROLE_USER'
                        ],
                        'travel' => [
                            '_route' => 'travel',
                            'label' => 'Travel',
                            '_permissions' => 'ROLE_USER'
                        ],
                        'black_market' => [
                            '_route' => 'black_market',
                            'label' => 'Black Market',
                            '_permissions' => 'ROLE_USER'
                        ]
                    ]
                ]
            ],
            'right' => [
                'gambling' => [
                    'label' => 'GAMBLING',
                    '_type' => 'category',
                    '_permissions' => 'ROLE_USER',
                    'content' => [
                        'blackjack' => [
                            '_route' => 'games',
                            '_parameters' => ['game' => 'blackjack'],
                            'label' => 'Blackjack',
                            '_permissions' => 'ROLE_USER'
                        ]
                    ]
                ],
                'gangs' => [
                    'label' => 'GANGS',
                    '_type' => 'category',
                    '_permissions' => 'ROLE_USER',
                    'content' => [
                        'all_gangs' => [
                            '_route' => 'gangs',
                            'label' => 'All Gangs',
                            '_permissions' => 'ROLE_USER'
                        ],
                        'my_gang' => [
                            '_route' => 'my_gang',
                            'label' => 'My Gang',
                            '_permissions' => 'ROLE_GANGMEMBER'
                        ],
                        'gang_bank' => [
                            '_route' => 'gang_bank',
                            'label' => 'Gang Bank',
                            '_permissions' => 'ROLE_GANGMEMBER'
                        ],
                        'logs' => [
                            '_route' => 'gang_logs',
                            'label' => 'Logs',
                            '_permissions' => 'ROLE_GANG_MODERATOR'
                        ]
                    ]
                ],
                'murder' => [
                    'label' => 'MURDER',
                    '_type' => 'category',
                    '_permissions' => 'ROLE_USER',
                    'content' => [
                        'kill' => [
                            '_route' => 'kill',
                            'label' => 'Kill',
                            '_permissions' => 'ROLE_USER'
                        ],
                        'find_user' => [
                            '_route' => 'find_user_murder',
                            'label' => 'Find User',
                            '_permissions' => 'ROLE_USER'
                        ],
                        'bounties' => [
                            '_route' => 'bounties',
                            'label' => 'Bounties',
                            '_permissions' => 'ROLE_USER'
                        ]
                    ]
                ],
                'administrator' => [
                    'label' => 'Administrator',
                    '_type' => 'category',
                    '_permissions' => 'ROLE_ADMIN',
                    'content' => [
                        'admin' => [
                            '_route' => 'admin_dashboard',
                            'label' => 'Admin Dashboard',
                            '_permissions' => 'ROLE_ADMIN'
                        ]
                    ]
                ]
            ]
        ]);
        $core_module->setActive(true);
        $em->persist($core_module);
        $em->flush();
        return $this->redirectToRoute('admin_dashboard');
    }
    /**
     * @Route("/init/theme")
     */
    public function init_theme() {
        $em = $this->getDoctrine()->getManager();
        $theme = $em->getRepository(Entity\Theme::class)->findOneByName('default');
        if (!$theme) {
            $theme = new Entity\Theme();
            $theme->setName('default');
            $theme->setCreator('Gangster Legends');
        }
        $theme->setAssets([
            'stylesheets' => [
                '/css/bootstrap.min.css',
                '/css/style.css',
                '/external/metismenu/metisMenu.min.css'
            ],
            'images' => [
                'icon' => '/images/icon.png',
                'logo' => '/images/logo.png'
            ],
            'javascripts' => [
                '/js/jquery.js',
                '/js/bootstrap.min.js',
                '/js/timer.js',
                '/js/mobile.js',
                '/external/metismenu/metisMenu.min.js'
            ],
            'admin' => [
                'stylesheets' => [
                    '/css/admin.css',
                    '/3rdparty/datatables/datatables.min.css',
                    '/3rdparty/sidebar/assets/css/jquery.mCustomScrollbar.min.css',
                    '/3rdparty/sidebar/assets/css/custom.css',
                    '/3rdparty/sidebar/assets/css/custom-themes.css',
                    '/3rdparty/summernote/summernote.css'
                ],
                'images' => [],
                'javascripts' => [
                    '/js/admin.js',
                    '/3rdparty/datatables/datatables.min.js',
                    '/3rdparty/sidebar/assets/js/jquery.mCustomScrollbar.concat.min.js',
                    '/3rdparty/sidebar/assets/js/custom.js',
                    '/3rdparty/summernote/summernote.js'
                ]
            ]
        ]);
        $em->persist($theme);
        $em->flush();
        return $this->redirectToRoute('admin_dashboard');
    }
    /**
     * @Route("/make/{type}", name="admin_maker")
     */
    public function admin_maker(Request $request, $type) {
        $em = $this->getDoctrine()->getManager();
        $form = null;
        switch(strtolower($type)) {
            case 'user':
                $user = new Entity\User();
                $form = $this->createForm(Form\UserType::class, $user);

                $form->handleRequest($request);
                if ($form->isSubmitted() && $form->isValid()) {
                    $em->persist($user);
                    $em->flush();
                    $this->addFlash('response', 'Succesfully added user');
                }
                break;
        }
        return $this->renderTemplate(str_replace('{type}', strtolower($type), 'admin/make/{type}.html.twig'), [
            'controller_name' => 'AdminController',
            'form' => $form->createView(),
            'loginPostfix' => null,
            'loginSuffix' => null,
            'alerts' => null,
            'game' => null
        ]);
    }
}
