import { useState, Fragment } from "react";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faChevronCircleDown, faChevronCircleUp, faCirclePlay } from "@fortawesome/free-solid-svg-icons";
import classNames from "classnames/bind";

import styles from './Learning.module.scss';
const cx = classNames.bind(styles)

function TabList({ dataTabList, setDataVideo }) {
    const [openChapter, setOpenChapter] = useState([])

    const toggleOpenChapter = (index) => {
        setOpenChapter((prevOpenChapters) => {
            const updateOpenChapters = [...prevOpenChapters]
            updateOpenChapters[index] = !updateOpenChapters[index]
            return updateOpenChapters
        })
    }

    const setDataLesson = (lesson) => {
        setDataVideo(lesson);
        console.log(lesson);
    };

    return (
        <div className={cx('tab-list')}>
            <div className={cx('heading')}>Nội dung khóa học</div>
            <div className={cx('list-chapters')}>
                {
                    dataTabList.map((item, index) => (
                        <Fragment key={`item-${index}`}>
                            <div className={cx('chapters')} onClick={() => toggleOpenChapter(index)}>
                                <div className={cx('chapters-infor')}>
                                    <span className={cx('title-chapter')}>
                                        {index}. {item.chapter.title_chapters}
                                    </span>
                                    <span className={cx('other-infor')}>
                                        3/3 | 00:00
                                    </span>
                                </div>
                                <FontAwesomeIcon className={cx('chapter-icon-down')} icon={openChapter[index] ? faChevronCircleUp : faChevronCircleDown} />
                            </div>
                            <div className={cx('list-lessons', { 'open': openChapter[index] })}>
                                {item.lesson.map((lesson) => (
                                    <div className={cx('lesson')} key={lesson.lessons_id} onClick={() => setDataLesson(lesson)}>
                                        <h3>{lesson.title_lesson}</h3>
                                        <span className={cx('duration-lesson')}>
                                            <FontAwesomeIcon icon={faCirclePlay} />
                                            <span className={cx('duration')}>{lesson.duration_lesson}</span>
                                        </span>
                                    </div>
                                ))}
                            </div>
                        </Fragment>
                    ))
                }
            </div>
        </div>
    );
}

export default TabList;