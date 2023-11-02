import { useEffect, useState, memo, Fragment } from "react";
import { useParams } from "react-router-dom";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import courses from "../../apiService/coursesService";
import classNames from "classnames/bind";
import Video from "../../components/Video";
import styles from './Learning.module.scss';
import { faChevronCircleDown, faChevronCircleUp, faCirclePlay } from "@fortawesome/free-solid-svg-icons";

const cx = classNames.bind(styles)

function Learning() {
    const { courses_id } = useParams();
    const [dataVideo, setDataVideo] = useState([])
    const [data, setData] = useState([])
    const [openChapter, setOpenChapter] = useState([])

    useEffect(() => {
        courses.getDataLearnDefault(courses_id)
            .then(response => {
                // console.log(response);
                setDataVideo(response.currentVideo)
                setData(response)
            });
    }, [])

    const toggleOpenChapter = (index) => {
        setOpenChapter((prevOpenChapters) => {
            const updateOpenChapters = [...prevOpenChapters]
            updateOpenChapters[index] = !updateOpenChapters[index]
            return updateOpenChapters
        })
    }
    
    const setDataLesson = (index, lesson_id) => {
        setDataVideo((prevDataVideo) => {
            const updateDataVideo = { ...prevDataVideo };
            const lesson = data.dataTabList[index].lesson.find(l => l.lesson_id === lesson_id);
            updateDataVideo.name_lesson = lesson ? lesson.title_lesson : 'NaN';
            return updateDataVideo;
        });
    };

    return (
        <div className="min-h-screen w-full bg-primary flex justify-between items-start">
            <div className={cx('main')}>
                <Video data={dataVideo}></Video>
                <div className={cx('infor-lesson')}>
                    <h3 className={cx('title-lesson')}>{dataVideo.name_lesson}</h3>
                </div>
            </div>
            {!Array.isArray(data) && (
                <div className={cx('navigation-learn')}>
                    <div className={cx('actions')}>
                        <div className={cx('progress')}>
                            0%
                        </div>
                        <button className={cx('note-btn')}>Ghi chú</button>
                    </div>
                    <div className={cx('infor_courses')}>
                        <a className={cx('name_courses')}>{data.courses.name_courses}</a>
                        <h4 className={cx('author')}>by {data.courses.list_author}</h4>
                    </div>
                    <div className={cx('tab-list')}>
                        <h4 className={cx('content-courses')}>Nội dung khóa học</h4>
                        <div className={cx('list-chapters')}>
                            {
                                data.dataTabList.map((item, index) => (
                                    <Fragment key={index}>
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
                                                <div className={cx('lesson')} key={lesson.lesson_id} onClick={() => setDataLesson(index, lesson.lesson_id)}>
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
                </div>
            )}

        </div>
    );
}

export default memo(Learning);