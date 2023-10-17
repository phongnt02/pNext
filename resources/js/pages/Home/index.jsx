import { useEffect, useState } from "react";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faGraduationCap, faPerson, faVideo } from "@fortawesome/free-solid-svg-icons";
import classNames from "classnames/bind";
import styles from './Home.module.scss';
import homeService from "../../apiService/homeService";
import SearchHome from './Search'
import Partner from "./Partner";
import CoursesPopular from "./CoursesPopular";
import OwnerViews from "../../components/OwnerViews";

const cx = classNames.bind(styles)

function Home() {
    const [data, setData] = useState({})

    useEffect(() => {
        homeService.getDataDefault()
            .then(response => {
                setData(response)
            })
    }, [])

    const getIconFromString = (iconName) => {
        switch (iconName) {
            case 'faGraduationCap':
                return faGraduationCap;
            case 'faPerson':
                return faPerson;
            case 'faVideo':
                return faVideo;
            default:
                return null;
        }
    }

    return (
        <div className="w-full xl:max-w-screen-xl h-auto bg-primary px-32 2xl:px-2">
            <div className="flex h-auto py-8">
                <div className="h-full w-full">
                    <h3 className="text-black text-5xl ont-mono py-4 w-full">{data.introduce?.title}</h3>
                    <span className="text-gray-900">
                        {data.introduce?.provider}
                    </span>
                    <SearchHome />
                </div>
                <div className="h-full w-full flex justify-center items-center">
                    <img className={cx('thumbnail')} alt="img" src={data.introduce?.thumbnail}></img>
                </div>
            </div>

            <div className="w-full h-auto py-24">
                <Partner data={data} />
            </div>

            <div className="w-full h-auto py-24">
                <CoursesPopular />
            </div>

            <div className="w-full h-auto py-24 flex justify-between">
                <div className="h-full w-1/2">
                    <img className={cx('difference_img')} alt="difference" src={data.difference?.thumbnail}></img>
                </div>
                <div className="h-full w-1/2">
                    <h3 className="text-black text-4xl ont-mono py-12 w-full">{data.difference?.title}</h3>
                    <div className={cx('statistics')}>
                        {data.difference?.statistics.map((item, index) => (
                            <div key={index} className="flex justify-center items-center text-black">
                                <span className="text-5xl"><FontAwesomeIcon icon={getIconFromString(item.Fontawesomeicon)}></FontAwesomeIcon></span>
                                <span className="pl-6">
                                    <div className="text-3xl">{item.value}</div>
                                    <div className="text-xl text-gray-400">{item.name}</div>
                                </span>
                            </div>
                        ))}
                    </div>
                </div>
            </div>

            <div className="w-full h-auto py-16 flex justify-center flex-col items-center">
                <h3 className="text-black text-4xl ont-mono py-24 w-full text-center">Feedback</h3>
                <div className={cx('feedback')}>
                    <div className="my-4">
                        <OwnerViews userName="phongnt" createdAt="2 tháng trước"/>
                    </div>
                    <div className={cx('content')}>
                        {data.feedback?.content}
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Home;