import { useEffect, useMemo, useState } from "react";
import classNames from "classnames/bind";
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faCaretDown } from "@fortawesome/free-solid-svg-icons";
import styles from './Courses.module.scss';
import PopperHeadless from "../../components/Popper/PopperHeadless";
import ListCourses from "../../components/ListCourses";
import Input from "../../components/Input";
import courses from "../../apiService/coursesService";

const cx = classNames.bind(styles)
function Courses() {
    const [selectExam, setSelectExam] = useState('Tất cả')
    const [selectLevel, setSelectLevel] = useState('Tất cả')
    const [listcourses, setListCourses] = useState([])
    const [isLoading, setIsLoading] = useState(false);

    useEffect(() => {
        if (selectLevel == 'Tất cả' && selectExam == 'Tất cả') {
            setIsLoading(true)
            courses.getListCourses()
                .then(response => {
                    setListCourses(response.data);
                    setIsLoading(false)
                })
        }
        else {
            setIsLoading(true)
            courses.searchSelect(selectLevel != 'Tất cả' ? selectLevel : false, selectExam != 'Tất cả' ? selectExam : false)
                .then(response => {
                    setListCourses(response.data);
                    setIsLoading(false)
                })
        }
    }, [selectLevel, selectExam])

    const handleSearchCourses = (data) => {
        setIsLoading(true)
        let searchDelay;
        if (searchDelay) {
            clearTimeout(searchDelay);
        }
        searchDelay = setTimeout(() => {
            courses.search(data)
            .then(response => {
                setListCourses(response.data)
                setIsLoading(false)
            })
        }, 500);
    }

    const htmlRender = useMemo(() => (
        <div className={cx('menu-select-courses')}>
            <div className={cx('menu-select-courses-item', { active: selectExam == 'Tất cả' })} onClick={() => setSelectExam('Tất cả')}>Tất cả</div>
            <div className={cx('menu-select-courses-item', { active: selectExam == 'JLPT' })} onClick={() => setSelectExam('JLPT')}>JLPT</div>
            <div className={cx('menu-select-courses-item', { active: selectExam == 'Kaiwa' })} onClick={() => setSelectExam('Kaiwa')}>Kaiwa</div>
        </div>
    ), [selectExam])

    const levelItems = ['Tất cả', 'N1', 'N2', 'N3', 'N4', 'N5'];
    const htmlRenderLevel = useMemo(() => (
        <div className={cx('menu-select-level')}>
            {levelItems.map((level, index) => (
                <div key={index} className={cx('menu-select-level-item', { active: selectLevel == level })} onClick={() => setSelectLevel(level)}>{level}</div>
            ))}
        </div>
    ), [levelItems])

    return (
        <div className={cx('wrapper')}>
            <div className={cx('barner')}>
                <h2 className={cx('slogan')}>Học Ngay - Về Đích Sớm</h2>
                <div className={cx('examination')}>
                    <span className={cx('select-courses')}>Chọn loại khóa học</span>
                    <PopperHeadless htmlRender={htmlRender}>
                        <div className={cx('current-select')}>
                            {selectExam}
                            <span className={cx('icon')}><FontAwesomeIcon icon={faCaretDown}></FontAwesomeIcon></span>
                        </div>
                    </PopperHeadless>
                </div>
            </div>
            <div className={cx('courses-manager')}>
                <div className={cx('feature')}>
                    <div className={cx('filter-courses')}>
                        <span className={cx('select-level')}>Chọn trình độ</span>
                        <PopperHeadless htmlRender={htmlRenderLevel}>
                            <div className={cx('current-level')}>
                                {selectLevel}
                                <span className={cx('icon')}><FontAwesomeIcon icon={faCaretDown}></FontAwesomeIcon></span>
                            </div>
                        </PopperHeadless>
                    </div>

                    <Input type="search" placeholder="Tìm kiếm khóa học" onDataInput={handleSearchCourses}></Input>
                </div>

                <ListCourses level={selectLevel} data={listcourses} isLoading={isLoading} />
            </div>
        </div>
    );
}

export default Courses;