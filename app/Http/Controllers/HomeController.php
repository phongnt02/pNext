<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getDataDefault () {
        $data = [
            'barner' => [
                'slogan_heading' => 'Học tiếng Nhật online',
                'slogan_sub' => 'Chinh phục kỳ thi JLPT'
            ],
            'brand' => [
                'type' => 'images',
                'path' => 'brand'
            ],
            'title_feature' => 'Những gì chỉ có tại iNihon',
            'feature' => [
                [
                    'pathImg' => 'slide',
                    'feature_infor' => 'Video bài giảng chất lượng cao',
                    'feature_infor_detail' => 'Bởi đội ngũ giáo viên xuất sắc và tận tâm, tốt nghiệp tại các trường Đại học danh tiếng'
                ],
                [
                    'pathImg' => 'check_note',
                    'feature_infor' => 'Đầy đủ bài mẫu, bài tập, mini test, progress test như thi thật',
                    'feature_infor_detail' => 'Bộ tài liệu đã giúp nhiều bạn vượt qua kỳ thi JLPT'
                ],
                [
                    'pathImg' => 'copy',
                    'feature_infor' => 'Bài 聴解 được cực kỳ chất lượng',
                    'feature_infor_detail' => 'Giáo viên chấm bài chính xác từng chữ với Writing, từng giây với Speaking, kết hợp bài kiểm tra phát âm bằng AI'
                ],
                [
                    'pathImg' => 'check_note',
                    'feature_infor' => 'Đầy đủ bài mẫu, bài tập, mini test, progress test như thi thật',
                    'feature_infor_detail' => 'Bộ tài liệu đã giúp nhiều bạn vượt qua kỳ thi JLPT'
                ],
            ],
            'latest_products' => [
                [
                    'name_products' => 'Khóa học tiếng Nhật',
                    'infor' => 'Học online qua video bài giảng, hệ thống bài test',
                    'infor_detail' => 'Với lộ trình được cá nhân hóa và hệ thống bài giảng lên tới hàng nghìn video/bài test, khóa học cam kết cung cấp đầy đủ kiến thức theo từng level khác nhau.',
                    'list_tab' => [
                        [
                            'courses' => 'Nền tảng JLPT',
                            'courses_list' => ['N1', 'N2', 'N3', 'N4', 'N5']
                        ],
                        [
                            'courses' => 'Luyện đề JLPT',
                            'courses_list' => ['N1', 'N2', 'N3', 'N4']
                        ],
                        [
                            'courses' => 'Kaiwa',
                            'courses_list' => ['Sơ cấp', 'Trung cấp']
                        ],
                    ],
                    'thumbnail' => 'courses1'
                ],
                [
                    'name_products' => 'Thư viện tài liệu',
                    'infor' => 'Tổng hợp một cách có chọn lọc từ các nguồn đề uy tín',
                    'infor_detail' => 'Với lộ trình được cá nhân hóa và hệ thống đề thi đa dạng, khóa học cam kết cung cấp đầy đủ kiến thức theo từng level khác nhau.',
                    'list_tab' => [
                        [
                            'courses' => 'Đề thi JLPT các năm',
                            'courses_list' => ['N1', 'N2', 'N3', 'N4', 'N5']
                        ],
                        [
                            'courses' => 'Đề thi thử sưu tầm',
                            'courses_list' => ['N1', 'N2', 'N3', 'N4']
                        ],
                    ],
                    'thumbnail' => 'courses1'
                ],
            ],
        ];
        return response()->json($data);
    }
}
