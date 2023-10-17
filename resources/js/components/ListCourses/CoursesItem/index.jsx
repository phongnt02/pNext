import { faMoneyBill, faPeopleGroup } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import classNames from "classnames/bind";
import { Link } from "react-router-dom";
import styles from '../ListCourses.module.scss';
import Button from '../../Button'
const cx = classNames.bind(styles)

function CoursesItem({courses}) {
    return (
        <Link to={`/courses/${courses.courses_id}`} className={cx('common-item')}>
            <div className={cx('thumbnail_course')}>
                <img src={courses.thumbnail} alt="error"></img>
                <div className={cx('join-course')}>
                    <Button classic>Xem khóa học</Button>
                </div>
            </div>
            <h4 className={cx('name_courses')}>{courses.name_courses}</h4>
            <div className={cx('infor')}>
                <div className={cx('count_member')}>
                    <FontAwesomeIcon icon={faPeopleGroup}></FontAwesomeIcon>
                    <span className={cx('value')}>{courses.enrollment_count}</span>
                </div>
                <div className={cx('cost_courses')}>
                    <FontAwesomeIcon icon={faMoneyBill}></FontAwesomeIcon>
                    <span className={cx('value','cost')}>{courses.price}</span>
                </div>
            </div>
        </Link>
    );
}

export default CoursesItem;