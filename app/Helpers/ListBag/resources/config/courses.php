<?php
return [
    'search' => [
        'courses_id' => [
            'label'=> 'ID Khóa học',
            'show' => false,
            'orderBy' => true,
        ],
        'name_courses' => [
            'label'=> 'Tên khóa học',
            'show' => true,
            'condition' => 'where',
            'orderBy' => true,
        ],
        'level' => [
            'label'=> 'Trình độ',
            'show' => true,
            'orderBy' => false,
        ],
        'list_author' => [
            'label'=> 'Tác giả',
            'show' => true,
            'orderBy' => false,
        ],
        'enrollment_count' => [
            'label'=> 'Số người đăng ký',
            'show' => true,
            'orderBy' => false,
        ],
        'price' => [
            'label'=> 'Giá',
            'show' => true,
            'orderBy' => false,
        ],
        'category' => [
            'label'=> 'Category',
            'show' => true,
            'orderBy' => false,
        ],
        'thumbnail' => [
            'label'=> 'Thumbnail',
            'show' => true,
            'orderBy' => false,
        ],
        'status' => [
            'label'=> 'Trạng thái',
            'show' => true,
            'orderBy' => false,
        ],
        'description' => [
            'label'=> 'Mô tả',
            'show' => true,
            'orderBy' => false,
        ],
        'start_date' => [
            'label'=> 'Thời gian bắt đầu',
            'show' => true,
            'orderBy' => false,
        ],
        'end_date' => [
            'label'=> 'Thời gian kết thúc',
            'show' => true,
            'orderBy' => false,
        ],
        'created_at' => [
            'label'=> 'Thời gian tạo',
            'show' => false,
            'orderBy' => false,
        ],
        'updated_at' => [
            'label'=> 'Thời gian cập nhật',
            'show' => false,
            'orderBy' => false,
        ],

    ],

    'form' => [
        'title_lesson' => [
            'type' => 'text',
            'maxlength' => 50,
            'placeholder' => '',
            'require' => true,
            'label' => 'Tên bài học'
        ],
        'author' => [
            'type' => 'text',
            'maxlength' => 50,
            'placeholder' => '',
            'require' => false,
            'label' => 'Tác giả'
        ],
        'description' => [
            'type' => 'text',
            'maxlength' => 255,
            'placeholder' => '',
            'require' => false,
            'label' => 'Mô tả bài học'
        ],
        'type_content' => [
            'type' => 'select',
            'require' => false,
            'label' => 'Loại tài liệu'
        ],
        'video' => [
            'type' => 'file',
            'label' => 'Tải lên video',
            'require' => false,
        ],
    ]
    
];
