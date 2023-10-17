import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faCirclePlay } from "@fortawesome/free-solid-svg-icons";
import classNames from "classnames/bind";
import styles from '../Home.module.scss';
import Button from '../../../components/Button';
import OwnerViews from "../../../components/OwnerViews";

const cx = classNames.bind(styles)

function CoursesPopular() {
    return (
        <>
            <div className="flex justify-between items-center h-20 ">
                <h3 className="text-white text-4xl ">Popular <span className="text-indigo-400">Courses</span></h3>
                <div className="h-20">
                    <ul className={cx('tab')}>
                        <li className={cx('item')}>
                            Japanese
                        </li>
                        <li className={cx('item')}>
                            Development
                        </li>
                        <li className={cx('item')}>
                            Bussiness
                        </li>
                        <li className={cx('item')}>
                            Data Science
                        </li>
                    </ul>
                </div>
            </div>


            <div className="w-full grid grid-cols-3 grid-rows-2 gap-x-20 gap-y-20 my-32">
                <div className={cx('courses-item')}>
                    <img className={cx('thumbnail')} src="https://dungmori.com/cdn/course/default/1690873005_37035_14f279.png"></img>
                    <div className={cx('information')}>
                        <div className="py-4 flex justify-between items-center">
                            <div className={cx('count-member')}>
                                <span className={cx('icon-play')}><FontAwesomeIcon icon={faCirclePlay}></FontAwesomeIcon></span>
                                <span className={cx('member')}>500</span>
                            </div>
                            <Button primary small className={cx('label')}>
                                Japanese
                            </Button>
                        </div>
                        <h3 className={cx('name-courses')}>Luyện đề N3</h3>
                        <div className={cx('other')}>
                            <OwnerViews userName="Dungmorri.com" createdAt="2 năm trước" src=""/>
                            <div className={cx('cost')}>
                                2000000đ
                            </div>
                        </div>
                        <div className={cx('options')}>
                            <div className={cx('rates')}>

                            </div>
                            <a className={cx('enroll')}>Enroll Now</a>
                        </div>
                    </div>
                </div>

            </div>

            <div className="w-full my-12 flex justify-center">
                <Button primary large scale >Explore all courses</Button>
            </div>
        </>
    );
}

export default CoursesPopular;