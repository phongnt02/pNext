import Slider from 'react-slick';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import classNames from "classnames/bind";
import styles from '../Home.module.scss';
import { faChevronCircleLeft, faChevronCircleRight } from '@fortawesome/free-solid-svg-icons';
const cx = classNames.bind(styles)

function Partner({ data }) {

    const Arrow = ({ position = 'left', onClick }) => (
        <span className={cx({ 'text-gray-400': true, 'slickBtn' : true , 'slickBtnPrev': position === 'left', 'slickBtnNext': position === 'right' })} onClick={onClick}>
            {position === 'left' ? (
                <FontAwesomeIcon icon={faChevronCircleLeft} />
            ) : (
                <FontAwesomeIcon icon={faChevronCircleRight} />
            )}
        </span>
    );

    const settings = {
        infinite: true,
        speed: 500,
        slidesToShow: 3,
        slidesToScroll: 1,
        variableWidth: true, // bỏ css inline thẻ div bao bọc
        prevArrow: <Arrow />,
        nextArrow: <Arrow position='right' />,
    };

    return (
        <div className={cx('frame')}>
            <h3 className={cx('title')}>{data.partner?.title}</h3>
            <Slider className={cx('list-item')} {...settings}>
                {data.partner?.detail_partner.map((item, index) => (
                    <a key={index} href={item.website} className={cx('item')}>
                        <img className={cx('item-img')} src={item.path_logo} alt={item.name}></img>
                    </a>
                ))}
            </Slider>
        </div>
    );
}

export default Partner;