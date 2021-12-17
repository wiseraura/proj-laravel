<?php
    //default_config
    return [
        'format'           => [
            'long_time'    => 'H:m:s d/m/Y',
            'short_time'   => 'd/m/Y'
        ],

        'template'         => [
            'form_input' => [
                'class' => 'form-control col-md-6 col-xs-12'
            ],
            'form_label' => [
                'class' => 'control-label col-md-3 col-sm-3 col-xs-12'
            ],
            'form_label_edit' => [
                'class' => 'control-label col-md-4 col-sm-3 col-xs-12'
            ],

            'form_ckeditor' => [
                'class' => 'form-control col-md-6 col-xs-12 ckeditor'
            ],

            'is_home'       => [
                1 => ['name' => 'Hiển thị', 'class' => 'btn-primary'],
                0 => ['name' => 'Ẩn', 'class' => 'btn-warning']
            ],
            'display'       => [
                'list'      => ['name'=> 'Danh sách'],
                'grid'      => ['name'=> 'Lưới'],
            ],
            'type' => [
                'featured'   => ['name'=> 'Nổi bật'],
                'normal'     => ['name'=> 'Bình thường'],
            ],

            'level'       => [
                'admin'      => ['name'=> 'Quản trị hệ thống'],
                'member'      => ['name'=> 'Người dùng bình thường'],
            ],

            'status'       => [
                'all'      => ['name' => 'Tất cả phần tử', 'class' => 'btn-primary'],
                'active'   => ['name' => 'Kích hoạt', 'class'      => 'btn-success'],
                'inactive' => ['name' => 'Chưa kích hoạt', 'class' => 'btn-danger'],
                'default'  => ['name' => 'Chưa xác định', 'class'  => 'btn-info']
            ],

            'search'          => [
                'all'         => ['name'  => 'Search by All'],
                'id'          => ['name'  => 'Search by Id'],
                'name'        => ['name'  => 'Search by Name'],
                'username'    => ['name'  => 'Search by Username'],
                'fullname'    => ['name'  => 'Search by Fullname'],
                'email'       => ['name'  => 'Search by Email'],
                'description' => ['name'  => 'Search by Description'],
                'link'        => ['name'  => 'Search by Link'],
                'content'     => ['name'  => 'Search by Content']
            ],

                'button'          => [
                    'edit'        => ['class' => 'btn-success', 'title'           => 'Edit', 'icon'   => 'fa-pencil', 'route-name' => "/form"],
                    'delete'      => ['class' => 'btn-danger btn-delete', 'title' => 'Delete', 'icon' => 'fa-trash', 'route-name'  => "/delete"],
                    'info'        => ['class' => 'btn-info', 'title'              => 'View', 'icon'   => 'fa-eye', 'route-name'    => "/form"]
                ]
        ],

        'config' => [
            'search' => [
                'default'  => ['all', 'id', 'fullname'],
                'slider'   => ['all', 'id', 'name', 'description', 'link'],
                'category' => ['all', 'name'],
                'article'  => ['all', 'name', 'content']
            ],

            'button' => [
                'default'  => ['edit', 'delete'],
                'slider'   => ['edit', 'delete', 'info'],
                'category' => ['edit', 'delete'],
                'article'  => ['edit', 'delete'],
                'user'     => ['edit']
            ]
        ]
    ];
?>
