import classNames from "classnames/bind";
import styles from './ListCourses.module.scss';
import CoursesItem from "./CoursesItem";
import Loading from "../Loading";

const cx = classNames.bind(styles)

function ListCourses({ level, data, isLoading }) {
    return (
        <div className={cx('wrapper')}>
            <h3 className={cx('heading')}>Trình độ khóa học : {level}</h3>

            {isLoading ? (
                <Loading></Loading>
            ) :
                data.length == 0 ? (
                    <div className="w-full h-80 flex items-center justify-center">
                        No Result
                    </div>
                ) : (
                    <div className={cx('list-courses')}>
                        {Array.isArray(data) && data.length > 0 && data.map((item) => (
                            <CoursesItem key={item.id_courses} courses={item}></CoursesItem>
                        ))}
                    </div>
                )
            }
        </div>
    );
}

export default ListCourses;