<?php

return [

    'items' => [
                'home' => [
                            'blade' => 'welcome',
                            'link' => '/',
                            'label' => 'Dashboard',
                            'dropdown' => 0,
                ],
                'members' => [
                            'blade' => 'members',
                            'link' => '#',
                            'label' => 'Members',
                            'dropdown' => [
                                          'action' => [
                                                        'page' => 'members',
                                                        'link' => '/members',
                                                        'label' => 'List',
                                          ],
                                          'something' => [
                                                        'page' => 'members.add',
                                                        'link' => '/members/add',
                                                        'label' => 'Add',
                                                        'divider' => 1,
                                          ],
                            ],
                ],
                // 'dropdowns' => [
                //             'blade' => 'dropdowns',
                //             'link' => '#',
                //             'label' => 'Dropdown',
                //             'dropdown' => [
                //                           'action' => [
                //                                         'page' => 'action',
                //                                         'link' => '/action',
                //                                         'label' => 'Action',
                //                           ],
                //                           'something' => [
                //                                         'page' => 'something',
                //                                         'link' => '/something',
                //                                         'label' => 'Something',
                //                                         'divider' => 1,
                //                           ],
                //             ],
                // ],

    ],

];
