<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getDataDefault () {

        $data = [
            'introduce' => [
                'title' => 'Các khóa học tốt nhất đang chờ đợi để nâng cao kỹ năng của bạn',
                'provider' => 'Cung cấp cho bạn hệ thống và tài liệu trực tuyến mới nhất giúp kiến thức của bạn ngày càng phát triển',
                'thumbnail' => asset('img/thumbnail.png')
            ],
            'partner' => [
                'title' => 'Đối tác của chúng tôi',
                'detail_partner' => [
                    [
                        'name' => 'Dungmorri',
                        'website' => 'https://dungmori.com/',
                        'path_logo' => asset('img/dungmorri.png')
                    ],
                    [
                        'name' => 'Riki',
                        'website' => 'https://riki.edu.vn/',
                        'path_logo' => asset('img/riki.png')
                    ],
                    [
                        'name' => 'Gitlab',
                        'website' => 'https://about.gitlab.com/',
                        'path_logo' => asset('img/gitlab.png')
                    ],
                    [
                        'name' => 'Dungmorri',
                        'website' => 'https://dungmori.com/',
                        'path_logo' => asset('img/dungmorri.png')
                    ],
                    [
                        'name' => 'Riki',
                        'website' => 'https://riki.edu.vn/',
                        'path_logo' => asset('img/riki.png')
                    ],
                    [
                        'name' => 'Gitlab',
                        'website' => 'https://about.gitlab.com/',
                        'path_logo' => asset('img/gitlab.png')
                    ]
                ]
            ],
            'popular_courses' => [
                'title' => 'Khóa học phổ biến',
                
            ]
            ,
            'difference' => [
                'thumbnail' => asset('img/difference.png'),
                'title' => 'Sự khác biệt của chúng tôi',
                'statistics' => [
                    [
                        'Fontawesomeicon' => 'faGraduationCap',
                        'value' => '300',
                        'name' => 'Instructor'
                    ],
                    [
                        'Fontawesomeicon' => 'faPerson',
                        'value' => '20,000+',
                        'name' => 'Students'
                    ],
                    [
                        'Fontawesomeicon' => 'faVideo',
                        'value' => '1000+',
                        'name' => 'Video'
                    ],
                ]
            ],
            'feedback' => [
                'content' => 'Nội dung bài giảng là yếu tố quan trọng nhất đối với mình. Và đã khiến mình u mê đến mức lạc lối luôn. Qua trải nghiệm cá nhân, mình nhận ra rằng nền tảng là điều thiết yếu. Có thể mình đã được luyện rất nhiều vì học chuyên, nhưng mình chưa được học bài bản nên kĩ năng làm bài không thực sự chắc chắn. Thông qua nội dung học ở Prep, đặc biệt phần Reading và Writing, mình đã có tiến bộ rõ rệt trong tốc độ cũng như độ chính xác khi làm bài, Writing biết cách sắp xếp ý tứ, câu từ logic hơn hẳn, Reading biết cách skim và scan “chuyên nghiệp” hơn hồi học lỏm từ các bài post trên mạng. Còn phần Speaking thì được học bài bản như vậy với một số tiền phải nói là rẻ so với những trung tâm khác, khiến mình cảm thấy rất biết ơn Prep🥲, cứ như Prep cứu mình từ địa ngục nói ngọng líu ngọng lơ sang nói trôi chảy và có nhấn nhá ấy.'
            ]
        ];
        return response()->json($data);
    }
}
