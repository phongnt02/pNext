import { useEffect, useState } from "react";
import classNames from "classnames/bind";
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faCaretDown } from "@fortawesome/free-solid-svg-icons";
import Cookies from "js-cookie";
import styles from './CoursesLayout.module.scss';
import PopperHeadless from "../../../components/Popper/PopperHeadless";
import ListCourses from "../../../components/ListCourses";
import Input from "../../../components/Input";
import request from "../../../apiService/axiosConfig";

const cx = classNames.bind(styles)

function CoursesLayout() {
    const [selectExam,setSelectExam] = useState('JLPT')
    const [selectLevel,setSelectLevel] = useState('Tất cả')
    const [listcourses,setListCourses] = useState()
    const [isFirstRender,setIsFirstRender] = useState(true)
    
    useEffect(()=>{
        if(isFirstRender) {
            request.get('courses/',{
                headers : {
                'Authorization':`Bearer ${Cookies.get('Token_login')}`,
                }
            })
            .then(response => {
                setListCourses(response.data);
                setIsFirstRender(false)
            })
        }
        else {
            request.get(`courses/filter/${selectLevel}`,{
                headers : {
                'Authorization':`Bearer ${Cookies.get('Token_login')}`,
                }
            })
            .then((response)=>{
                setListCourses(response.data);
            })
        }
    },[selectLevel])

    const handleSearchCourses = (data) => {
        setListCourses(data)
    }

    const htmlRender = (
        <div className={cx('menu-select-exam')}>
            <div className={cx('menu-select-exam-item',{active: selectExam == 'JLPT'})} onClick={() => setSelectExam('JLPT')}>JLPT</div>
            <div className={cx('menu-select-exam-item',{active: selectExam == 'NATEST'})} onClick={() => setSelectExam('NATEST')}>NATEST</div>
        </div>
    )

    const levelItems = ['N1', 'N2', 'N3', 'N4', 'N5'];
    const htmlRenderLevel = (
        <div className={cx('menu-select-level')}>
            {levelItems.map((level,index) => (
                <div key={index} className={cx('menu-select-level-item', { active: selectLevel == level })} onClick={() => setSelectLevel(level)}>{level}</div>
            ))}
        </div>
    )

    return (
        <div className={cx('wrapper')}>
            <div className={cx('barner')}>
                <h2 className={cx('slogan')}>Học Ngay - Về Đích Sớm</h2>
                <div className={cx('examination')}>
                    <span className={cx('select-exam')}>Chọn kỳ thi</span>
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

                    <Input type="search" placeholder="Tìm kiếm khóa học" onSearch={handleSearchCourses}></Input>
                </div>
                
                <ListCourses level={selectLevel} data={listcourses}/>
                <ListCourses level={selectLevel} data={listcourses}/>

            </div>
        </div>
    );
}

export default CoursesLayout;