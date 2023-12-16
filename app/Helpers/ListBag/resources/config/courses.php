<?php
return [
    'search' => [
        'options' => [
            'label'=> 'Option',
            'show' => true,
            'inner' => function ($id, $index) {
                return '<a href="' . route("courses.edit", ['courses_id' => $id]) . '" 
                    data-tooltip-target="tooltip-edit-' . $index . '"
                    class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                </a>
                <div id="tooltip-edit-' . $index . '" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Chỉnh sửa
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <a href="' . route("courses.delete", ['courses_id' => $id]) . '" 
                    data-tooltip-target="tooltip-delete-' . $index . '"
                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"clip-rule="evenodd"></path></svg>
                </a>
                <div id="tooltip-delete-' . $index . '" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Xóa
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>';
            }
        ],
        'courses_id' => [
            'label'=> 'ID Khóa học',
            'show' => true,
            'orderBy' => true,
        ],
        'name_courses' => [
            'label'=> 'Tên khóa học',
            'show' => true,
            'condition' => 'LIKE',
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
        'name_folder_store' => [
            'label'=> 'Tên thư mục lưu trữ',
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
        'name_courses' => [
            'label'=> 'Tên khóa học',
            'type' => 'text',
            'maxlength' => '50',
            'require' => true,
            'value' => ''
        ],
        'level' => [
            'label'=> 'Trình độ',
            'type' => 'select',
            'require' => true,
            'options' => [
                'N1' => 'N1',
                'N2' => 'N2',
                'N3' => 'N3',
                'N4' => 'N4',
                'N5' => 'N5',
            ],
            'selected' => 'N3',
        ],
        'list_author' => [
            'label'=> 'Tác giả',
            'type' => 'text',
            'maxlength' => '50',
            'require' => true,
            'value' => ''
        ],
        'price' => [
            'label'=> 'Giá',
            'type' => 'text',
            'maxlength' => '50',
            'require' => true,
            'value' => ''
        ],
        'category' => [
            'label'=> 'Category',
            'type' => 'select',
            'require' => true,
            'options' => [
                'JLPT' => 'JLPT',
                'Kaiwa' => 'Kaiwa',
            ],
            'selected' => 'Kaiwa'
        ],
        'thumbnail' => [
            'label'=> 'Thumbnail',
            'type' => 'file',
            'require' => false,
            'value' => ''
        ],
        'status' => [
            'label'=> 'Trạng thái',
            'type' => 'select',
            'options' => [
                true => 'Công khai',
                false => 'Riêng tư',
            ],
            'selected' => false,
            'require' => false,
        ],
        'name_folder_store' => [
            'label'=> 'Tên thư mục lưu trữ',
            'type' => 'text',
            'maxlength' => '50',
            'require' => true,
            'value' => ''
        ],
        'description' => [
            'label'=> 'Mô tả',
            'type' => 'text',
            'maxlength' => '50',
            'require' => false,
            'value' => ''
        ],
        'start_date' => [
            'label'=> 'Thời gian bắt đầu',
            'type' => 'datetime',
            'maxlength' => '50',
            'require' => true,
            'value' => '',
            'placeholder' => 'Chọn thời gian'
        ],
        'end_date' => [
            'label'=> 'Thời gian kết thúc',
            'type' => 'datetime',
            'maxlength' => '50',
            'require' => true,
            'value' => '',
            'placeholder' => 'Chọn thời gian'
        ],
    ]
    
];
