import { useEffect, useState } from "react";
import { Link } from "react-router-dom";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faBook } from "@fortawesome/free-solid-svg-icons";
import Cookies from "js-cookie";
import classNames from "classnames/bind";
import styles from './LearnLayout.module.scss';
import Video from "../../../components/Video";
import Button from '../../../components/Button'
import request from '../../../apiService/axiosConfig'

const cx = classNames.bind(styles)

function LearnLayout({id_courses}) {
    const [dataCourse,setDataCourse] = useState(null)
    const [topics,setTopics] = useState([])
    const [currentTopic,setCurrentTopic] = useState()
    const [chapters,setChapter] = useState([])
    const [currentChapter,setCurrentChapter] = useState()
    const [currentLesson,setCurrentLesson] = useState([])
    const [flagLesson,setFlagLesson] = useState(false)
    const [videoData,setVideoData] = useState()

    const [tab,setTab] = useState('Tài liệu - Kiểm tra')

    useEffect(()=>{
        request.get(`/courses/learning/${id_courses}`,{
            headers : {
                'Authorization':`Bearer ${Cookies.get('Token_login')}`,
            }
        })
        .then((response)=>{
            setDataCourse(response.data)
        })
    },[])

    useEffect(()=>{
        if(dataCourse != null){
            // store list topics in state
            setTopics(dataCourse.topics)
            setCurrentTopic(dataCourse.topics[0])
        }
    },[dataCourse])

    useEffect(()=>{
        if(dataCourse != null){
            //store list chapters in state
            dataCourse.topics.map((topic)=>{
                if(topic.topic_id == currentTopic.topic_id) {
                    setChapter(topic.chapters)
                }
            })
        }

        if(flagLesson) {
            setFlagLesson(false)
        }
            
    },[currentTopic])
    
    useEffect(()=>{
        // store list lesson in state
        if(currentChapter){
            setCurrentLesson(currentChapter.lessons)
        }
    },[currentChapter])

    const handleShowHideLesson = (item) => {
        setCurrentChapter(item)
        setFlagLesson(prev => !prev)
    }

    return (
        <div className={cx('wrapper')}>
            <div className={cx('cta-courses')}>
                <Link to={`/courses/learning/${id_courses}`} className={cx('name-course')}>{dataCourse != null && dataCourse.course_name}</Link>
                <Button text small empty className={cx('general-courses')}>Tổng quan khóa học</Button>
            </div>
            <div className={cx('main-courses')}>
                <div className={cx('main-left')}>
                    <Video videoData={videoData} thumbnailCourse={(dataCourse != null) ? dataCourse.course_thumbnail : null} />
                    <ul className={cx('list-tab')}>
                        <li className={cx('tab-item',{active : tab == 'Tài liệu - Kiểm tra'})} onClick={()=> setTab('Tài liệu - Kiểm tra')}>Tài liệu - Kiểm tra</li>
                        <li className={cx('tab-item',{active : tab == 'Bình luận'})} onClick={()=> setTab('Bình luận')}>Bình luận</li>
                    </ul>
                    <div className={cx('content-tab')}>

                    </div>
                </div>
                <div className={cx('main-right')}>
                    <div className={cx('process-courses')}>
                        <span className={cx('process-heading')}>Tiến độ cả khóa</span>
                        <span className={cx('process-percent')}>0%</span>
                    </div>
                    <div className={cx('list-topics')}>
                        {typeof topics == 'object' && topics.map((item) => (
                            <Button key={item.topic_id} empty text moveTop small 
                            className={(currentTopic.topic_name == item.topic_name) ? ('active') : ('')}
                            onClick={()=>{
                                setCurrentTopic(item)
                            }}
                            >{item.topic_name}</Button>
                        ))}
                    </div>
                    <div className={cx('list-chapter')}>
                        {chapters.map((item)=> (
                            <div key={item.chapter_id} 
                            className={cx('chapter-item',{'active-lesson' : flagLesson && item.chapter_id == currentChapter.chapter_id})} 
                            onClick={() => handleShowHideLesson(item)}>
                                <div className={cx('chapter-detail')}>
                                    <FontAwesomeIcon className={cx('icon')} icon={faBook}></FontAwesomeIcon>
                                    <span className={cx('chapter-item-name')}>{item.chapter_name}</span>
                                </div>
                                <div className={cx('list-lesson')}>
                                    {currentChapter && flagLesson && item.chapter_id == currentChapter.chapter_id && currentLesson.map((lesson)=>(
                                        <div className={cx('lesson-item')} 
                                        key={lesson.lesson_id}
                                        onClick={()=> {
                                            setVideoData(lesson)
                                        }}
                                        >{lesson.lesson_name}</div>
                                    ))}
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </div>
        </div>
    );
}

export default LearnLayout;