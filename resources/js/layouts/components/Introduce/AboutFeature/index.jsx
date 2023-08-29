import React, { useEffect, useRef, useState } from "react";
import Slider from "react-slick";
import "slick-carousel/slick/slick.css"; 
import "slick-carousel/slick/slick-theme.css";
import classNames from "classnames/bind";

import style from '../Introduce.module.scss';
import images from "../../../../assets/image";
const cx = classNames.bind(style)

function AboutFeature({feature}) {

    const [currentSlide,setCurrentSlide] = useState(0)
    const sliderRef = useRef()

    useEffect(()=>{
        sliderRef.current.slickGoTo(currentSlide)
    },[currentSlide])

    const CustomDot = ({index}) => {
        
        return (
            <button type="button" className="dot-item" onClick={()=>setCurrentSlide(index)}>
                
            </button>
        )
    }

    const settings = {
        dots: true,
        dotsClass: "slick-dots-custom",
        customPaging : (i) => <CustomDot index={i}/>,
        ref:sliderRef,
        prevArrow: null,
        nextArrow: null,
        infinite: true,
        speed: 500,
        autoplay:true,
        autoplaySpeed:3000,
        slidesToShow: 3,
        slidesToScroll: 1,
    };


    return (
        <div className={cx('feature')}>
            <div className={cx('feature-title')}>Những gì chỉ có tại <span className={cx('text-blue')}>iNihon</span></div>
            <Slider {...settings}>
                {feature.map((item,key)=> {
                    return (
                        <div key={key} className={cx('feature-item')}>
                            <div className={cx('feature-icon')}>
                                <img src={images[item.pathImg]} alt="Ảnh lỗi"></img>
                            </div>
                            <h5 className={cx('feature-infor')}>{item.feature_infor}</h5>
                            <p className={cx('feature-infor-detail')}>{item.feature_infor_detail}</p>
                        </div>
                    )
                })}
            </Slider>
        </div>
    );
}

export default AboutFeature;