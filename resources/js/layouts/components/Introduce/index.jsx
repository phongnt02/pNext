import { useEffect, useState } from "react";
import classNames from "classnames/bind";
import style from './Introduce.module.scss';
import images from "../../../assets/image";
import AboutProduct from './AboutProduct';
import AboutFeature from "./AboutFeature";
import homeService from "../../../apiService/homeService";
const cx = classNames.bind(style)

function Introduce() {

    const [data, setData] = useState();
    console.log(data);

    useEffect(() => {
        const setDataDeFault = async () => {
            setData(await homeService.getDataDefault());
        }
        setDataDeFault()
    }, [])

    if (!data) {
        return (
          <div></div>
        )
    }

    const { barner, brand, feature, latest_products } = data;

    return (
        <>
            <div className={cx('barner')}>
                <div className={cx('slogan')}>
                    <h2>{barner.slogan_heading}</h2>
                    <p>{barner.slogan_sub}</p>
                </div>
                <div className={cx('brand')}>
                    <img src={images[brand.path]} alt="error"></img>
                </div>
            </div>
            <AboutFeature feature={feature}></AboutFeature>
            {latest_products.map((product, index) => (
                <AboutProduct key={index} data={product} left={index % 2 !== 0} right={index % 2 == 0} />
            ))}
        </>
    );
}

export default Introduce;