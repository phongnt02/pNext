import { useState } from "react";
import { Link, useLocation } from "react-router-dom";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faBook, faGripLinesVertical, faHouse, faNewspaper, faChevronLeft, faChevronRight } from "@fortawesome/free-solid-svg-icons";
import classNames from "classnames/bind";
import styles from './SideBar.module.scss';
import Popper from '../../components/Popper'

const cx = classNames.bind(styles)

const menu = [
    {
        content : 'Trang chủ',
        icon : faHouse,
        to : '/'
    },
    {
        content : 'Khóa học',
        icon : faBook,
        to: '/courses'
    },
    {
        content : 'Bài viết',
        icon : faNewspaper,
        to: '/news'
    },
];

function SideBar() {
    const routeCurrent = useLocation();
    const [isSideBar, setIsSideBar] = useState(true);
    const [icon, setIcon] = useState(faGripLinesVertical);

    const onToggleSideBar = () => {
        setIsSideBar(prev => !prev)
        setIcon(faGripLinesVertical);
    }

    const changeIconOpen = () => {
        setIcon(isSideBar ? faChevronLeft : faChevronRight)
    }

    const changeLeaveIcon = () => {
        setIcon(faGripLinesVertical);
    }

    return (
        <aside className={cx('sidebar', { isClose : !isSideBar, isOpen : isSideBar })}>
            <div className={cx('logo')}>
                <img className={cx('logo-img')} src="https://logos.flamingtext.com/Word-Logos/test-design-sketch-name.png"></img>
            </div>
            <nav className={cx('nav')}>
                {menu.map((item, index) => (
                    <div className={cx('item', {active : item.to === routeCurrent.pathname})} key={index}>
                        <Link to={item.to} >
                            <Popper content={item.content}>
                                <div className="w-full">
                                    <FontAwesomeIcon icon={item.icon}></FontAwesomeIcon>
                                </div>
                            </Popper>
                        </Link>
                    </div>
                ))}
            </nav>
            <div className={cx('btn-sidebar')} onClick={onToggleSideBar} onMouseEnter={changeIconOpen} onMouseLeave={changeLeaveIcon}>
                <FontAwesomeIcon icon={icon}></FontAwesomeIcon>
            </div>
        </aside>
    );
}

export default SideBar;