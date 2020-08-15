<?php
return [
    "template" => [
        "header"        => TEMPLATE_PATH . "header.php",
        "top-navbar"    => TEMPLATE_PATH . "navbar.php",
        "side-navbar"   => TEMPLATE_PATH . "sidebar.php",
        "breadcrumb"    => TEMPLATE_PATH . "breadcrumb.php",
        ":view"         => ":action_view",
        "footer"        => TEMPLATE_PATH . "footer.php",
        "EndTemplate"        => TEMPLATE_PATH . "endtemplate.php"
    ],
    "header_resources" => [
        "css" => [
            "ar" => [
                "fontAwesome"           => CSS . "fontawesome.min.css",
                "OverlayScrollbars"     => CSS . "OverlayScrollbars.min.css",
                "Datatable"             => CSS . "dataTables.bootstrap4.min.css",
                "Datatable Resposive"   => CSS . "responsive.bootstrap4.min.css",
                "adminlte"              => CSS . "adminlte.min.css",
                "main"                  => CSS . "style.css"
            ],
            "en" => [
                "fontAwesome"           => CSS . "fontawesome.min.css",
                "OverlayScrollbars"     => CSS . "OverlayScrollbars.min.css",
                "Datatable"             => CSS . "dataTables.bootstrap4.min.css",
                "Datatable Resposive"   => CSS . "responsive.bootstrap4.min.css",
                "Duallistbox"           => CSS . "bootstrap-duallistbox.min.css",
                "adminlte"              => CSS . "adminlte.min.css",
                "main"                  => CSS . "style.en.css"

            ]
        ],
        "js" => [
        ]
    ],
    "footer_resources" => [
        "js" =>[
            "jquery"                => JS . "jquery.min.js",
            "bootstrap"             => JS . "bootstrap.bundle.min.js",
            "jQuery DataTable"      => JS . "jquery.dataTables.min.js",
            "Datatable"             => JS . "dataTables.bootstrap4.min.js",
            "Datatable Resposive"   => JS . "dataTables.responsive.min.js",
            "Datatable Resposive"   => JS . "responsive.bootstrap4.min.js",
            "OverlayScrollbars"     => JS . "jquery.overlayScrollbars.min.js",
            "Duallistbox"           => JS . "jquery.bootstrap-duallistbox.min.js",
            "adminlte"              => JS . "adminlte.min.js",
            "BSCustomFileInput"     => JS . "BSCustomFileInput.js",
            "demo"                  => JS . "demo.js",
            "main"                  => JS . "main.js"
        ]
    ]
];