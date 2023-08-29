import classNames from "classnames/bind";
import styles from './ListCourses.module.scss';
import CoursesItem from "./CoursesItem";

const cx = classNames.bind(styles)

function ListCourses({level, data}) {
    return (
        <div className={cx('wrapper')}>
            <h3 className={cx('heading')}>Trình độ khóa học : {level}</h3>
            <div className={cx('list-courses')}>
                {typeof data == 'object' && data.map((item)=>(
                    <CoursesItem key={item.course_id} courses={item}></CoursesItem>
                ))}
            </div>
        </div>
    );
}

export default ListCourses;