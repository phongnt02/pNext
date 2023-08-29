import { Link } from "react-router-dom";
import classNames from "classnames/bind";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faFacebook, faInstagram, faTiktok } from '@fortawesome/free-brands-svg-icons';
import style from './Footer.module.scss';
import image from '../../../assets/image';
import Input from '../../../components/Input'

const cx = classNames.bind(style)

function Footer() {
    return (
        <footer className={cx('footer')}>
            <div className={cx('wrapper')}>
                <div className={cx('general')}>
                    <div className={cx('general-box')}>
                        <img src={image.logo} className={cx('logo')} alt="error"></img>
                        <span className={cx('blue-brand')}>iNihon</span>
                    </div>
                    <div className={cx('general-box')}>
                        <h3 className={cx('heading')}>Về iNihon</h3>
                        <ul>
                            <li className={cx('link')}><Link to="/">Giới thiệu</Link></li>
                            <li className={cx('link')}><Link to="/">Điều khoản dịch vụ</Link></li>
                            <li className={cx('link')}><Link to="/">Cam kết</Link></li>
                            <li className={cx('link')}><Link to="/">Trợ giúp</Link></li>
                            <li className={cx('link')}><Link to="/">FAQs</Link></li>
                        </ul>
                    </div>
                    <div className={cx('general-box')}>
                        <h3 className={cx('heading')}>Tải ứng dụng</h3>
                        <Link to="/"><img src={image.ggPlay} className={cx('download')} alt="error"></img></Link>
                        <Link to="/"><img src={image.appStore} className={cx('download')} alt="error"></img></Link>
                        <div className={cx('social-media')}>
                            <Link className={cx('facebook','brand')} to="https://www.facebook.com/zzthanhphongzz"><FontAwesomeIcon icon={faFacebook}/></Link>
                            <Link className={cx('instagram','brand')} to="https://www.instagram.com/thanhphong2901/"><FontAwesomeIcon icon={faInstagram}/></Link>
                            <Link className={cx('tiktok','brand')} to="https://www.facebook.com/zzthanhphongzz"><FontAwesomeIcon icon={faTiktok}/></Link>
                        </div>
                    </div>
                    <div className={cx('general-box')}>
                        <h3 className={cx('heading')}>Đăng ký nhận tin tức</h3>
                        <Input onSubcribe placeholder="Nhập email nhận tin tức"></Input>
                    </div>
                </div>
            </div>
            <div className={cx('copyright')}>Copyright &copy;2022 - iNihon</div>
        </footer>
    );
}

export default Footer;