import { Link } from "react-router-dom";
import classNames from "classnames/bind";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faFacebook, faInstagram, faTiktok } from '@fortawesome/free-brands-svg-icons';
import style from './Footer.module.scss';
import Input from '../../components/Input'
import { faEnvelope, faLocationDot } from "@fortawesome/free-solid-svg-icons";

const cx = classNames.bind(style)

function Footer() {
    return (
        <footer className="w-full flex justify-center flex-col items-center px-32 pt-16 h-auto bg-sub text-gray-900">
            <div className="h-auto w-full grid grid-cols-4 grid-rows-1 gap-14 xl:max-w-screen-xl">
                <div className="h-auto">
                    <div className="brand">
                        <img></img>
                        <span>NextJan</span>
                    </div>
                    <div className="description">

                    </div>
                </div>
                <div className="h-auto">
                    <h4 className="py-4 text-2xl">Quick Link</h4>
                    <ul className="grid grid-cols-2 grid-row-2 gap-8">
                        <li className="text-gray-900">About</li>
                        <li className="text-gray-900">Courses</li>
                        <li className="text-gray-900">Document</li>
                        <li className="text-gray-900">Contact</li>
                    </ul>
                </div>
                <div className="h-auto">
                    <h4 className="py-4  text-2xl">Contact</h4>
                    <div className="">
                        <div className="text-gray-900 py-4">
                            <FontAwesomeIcon icon={faEnvelope}></FontAwesomeIcon>
                            <a className="ml-8 text-gray-900">nextJan@email.com</a>
                        </div>
                        <div className="text-gray-900 py-4">
                            <FontAwesomeIcon icon={faFacebook}></FontAwesomeIcon>
                            <a href="https://www.facebook.com/zzthanhphongzz" className="ml-8 text-gray-900">NextJan</a>
                        </div>
                        <div className="text-gray-900 py-4">
                            <FontAwesomeIcon icon={faInstagram}></FontAwesomeIcon>
                            <a href="https://www.instagram.com/thanhphong2901/" className="ml-8 text-gray-900">NextJan</a>
                        </div>
                        <div className="text-gray-900 py-4">
                            <FontAwesomeIcon icon={faTiktok}></FontAwesomeIcon>
                            <a href="https://www.instagram.com/thanhphong2901/" className="ml-8 text-gray-900">NextJan</a>
                        </div>
                    </div>
                </div>
                <div className="h-auto">
                    <div className="text-gray-900 py-4 mt-12">
                        <FontAwesomeIcon icon={faLocationDot}></FontAwesomeIcon>
                        <a className="ml-8 text-gray-900">KTXA</a>
                    </div>
                </div>
            </div>
            <div className={cx('copyright')}>Copyright &copy;2022 - nextJan</div>
        </footer>
    );
}

export default Footer;