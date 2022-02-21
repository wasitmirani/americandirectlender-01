<?php
namespace App\Helper;

class HelperComponent {

    public static function SideBar(){
        return [
                [
                    "heading"=>"Main",
                ],
                [
                    "single_link" => setSingleLink( "Dashboard","home",null,"/"),
                ],

                [
                    "heading"=>"Management",
                    'v-can'=>'management-view',
                    "menu"=>[
                        "title"=>'User Management',
                        "icon"=>"user",
                        "sub_menu"=>[
                            setSubMenu(
                              "Users",
                               null,
                               "users-view",
                               "/users"
                            ),
                            setSubMenu(
                               "Roles",
                                null,
                                "roles-view",
                                "/roles"
                            ),
                            setSubMenu(
                                "Permissions",
                                null,
                                "permissions-view",
                                "/permissions"
                              )
                        ]

                    ],

                ],

                [
                    "heading"=>"Content",
                    "menu"=>[
                        "title"=>'Applications',
                        "icon"=>"file-text",
                        "sub_menu"=>[
                            setSubMenu(
                                "New App",
                                  null,
                                  "create-app",
                                  "/create/app"
                              ),
                            setSubMenu(
                              "Apps List",
                                null,
                                'app-list-view',
                                "/customer/applications"
                            ),
                            setSubMenu(
                                "Approved Apps",
                                null,
                               'approved-app-view',
                                "/assigned/apps"
                            ),
                            setSubMenu(
                                "Assigned Apps",
                                null,
                               'assigned-app-view',
                                "/agents/app"
                            ),
                            setSubMenu(
                                "My Apps",
                                null,
                                'my-app-view',
                                "/my/application"
                              )
                        ]

                    ],


                ],

                // [
                //     "single_link" => setSingleLink("Applications", "file-text", null, "/customer/applications"),
                // ],
                // [
                //     "single_link" => setSingleLink( "Approved Apps","file-text",null,"/assigned/apps"),
                // ],
                // [
                //     "single_link" => setSingleLink( "My Apps","file-text",null,"/my/apps"),
                // ],
                // [
                //     "single_link" => setSingleLink( "Assign App","file-text",null,"/assign/apps"),
                // ],
                // [
                //     "single_link" => setSingleLink("Logout","arrow",null,"logout"),
                // ],
                [
                    "single_link" => setSingleLink( "Notify","bell","notify-view","/send/notify"),
                ],
                [
                    "heading" => "Config",
                ],
                [
                    "single_link" => setSingleLink("Settings", "settings", null, "/password/setting"),
                ],

                // [
                //     "single_link" => setSingleLink("Logs", "bullseye", null, "/logs/activities"),
                // ],

                [
                    "heading"=>"Session",
                ],

     ];
    }
}
