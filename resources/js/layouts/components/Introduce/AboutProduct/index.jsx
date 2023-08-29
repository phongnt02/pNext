import { useState } from "react";
import classNames from "classnames/bind";
import style from '../Introduce.module.scss';
import Button from '../../../../components/Button'
import images from "../../../../assets/image";

const cx = classNames.bind(style)


function AboutProduct({left, right, data}) {
    const [tabsContent,setTabsContent] = useState(data.list_tab[0])
    
    const thumbnails = (
        <div className={cx('product-thumbnail')}>
            <div className={cx('product-thumbnail-view')}>
                <img src={images[data.thumbnail]} alt="error"></img>
            </div>
        </div>
    )
    return (
        <div className={cx('product')}>
            {left && thumbnails}
            <div className={cx('product-infor')}>
                <div className={cx('flag')}>
                    <div className={cx('pole')}>
                        <div className={cx('flag-run')}>
                            <h1 className={cx('heading')}>{data.heading}</h1>
                        </div>
                    </div>
                </div>
                <p className={cx('infor')}>{data.infor}</p>
                <p className={cx('infor-detail')}>{data.infor_detail}</p>
                <ul className={cx('list-tab')}>
                    {data.list_tab.map((tab,index)=>{
                        return (
                            <li key={index} className={cx('list-tab-item',{'active': tab.courses === tabsContent.courses} )} onClick={()=> {setTabsContent(tab)}}>{tab.courses}</li>
                        )
                    })}
                </ul>
                <div className={cx('tabs-content')}>
                    {tabsContent.courses_list.map((tab,index)=>(
                        <Button empty small key={index}>{tab}</Button>
                    ))}
                </div>
            </div>
            
            {right && thumbnails}
        </div>
    );
}

export default AboutProduct;