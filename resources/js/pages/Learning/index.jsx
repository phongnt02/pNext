import { useEffect, useState } from "react";
import { useParams, Link } from "react-router-dom";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import classNames from "classnames/bind";
import courses from "../../apiService/coursesService";
import Video from "../../components/Video";
import TabList from "./TabList";
import styles from './Learning.module.scss';
import { faBell, faLeftLong, faPen } from "@fortawesome/free-solid-svg-icons";

const cx = classNames.bind(styles)

function Learning() {
    const { courses_id } = useParams();
    const [dataVideo, setDataVideo] = useState([])
    const [data, setData] = useState([])

    useEffect(() => {
        courses.getDataLearnDefault(courses_id)
            .then(response => {
                setDataVideo(response.dataTabList[0].lesson[0])
                setData(response)
            });
    }, [])

    return (
        <div className="relative min-h-screen w-full bg-primary px-16 grid grid-cols-3 grid-rows-2 gap-20 mt-40">
            <div className="fixed z-10 top-0 left-0 w-full h-24 px-16 bg-sub flex justify-between items-center">
                <Link to="/courses">
                    <FontAwesomeIcon icon={faLeftLong}></FontAwesomeIcon>
                    <span className="pl-4">Back</span>
                </Link>
                <h3 className="text-3xl">{data?.courses?.name_courses}</h3>
                <div className="plugins flex justify-around">
                    <div className="cursor-pointer hover:text-gray-600 mx-4 min-w-[40px] text-center py-6">
                        <FontAwesomeIcon icon={faPen}></FontAwesomeIcon>
                        <span className="pl-2">Ghi chú</span>
                    </div>
                    <div className="cursor-pointer hover:text-gray-600 mx-4 min-w-[40px] text-center py-6">
                        <FontAwesomeIcon icon={faBell}></FontAwesomeIcon>
                    </div>
                </div>
            </div>
            <div className="col-span-2">
                <div className={cx('main')}>
                    <Video dataVideo={dataVideo}></Video>
                    <div className={cx('infor-lesson')}>
                        <h3 className={cx('title-lesson')}>{dataVideo.title_lesson}</h3>
                    </div>
                </div>
            </div>
            {!Array.isArray(data) && (
                <div className="col-span-1">
                    <div className={cx('navigation-learn')}>
                        <TabList dataTabList={data.dataTabList} setDataVideo={setDataVideo} />
                    </div>
                </div>
            )}
        </div>
    );
}

export default Learning;