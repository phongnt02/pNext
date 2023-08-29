import { useEffect, useState } from "react";
import classNames from "classnames/bind";
import ContentLoader from "react-content-loader";
import style from './Introduce.module.scss';
import images from "../../../assets/image";
import AboutProduct from './AboutProduct';
import AboutFeature from "./AboutFeature";
import homeService from "../../../apiService/homeService";
import Button from "@mui/material/Button";
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
            <ContentLoader
                speed={2}
                width={1200}
                height={400}
                backgroundColor="#f0f0f0"
            >
                <rect x="170" y="100" rx="4" ry="4" width="1000" height="15" />
                <rect x="170" y="130" rx="4" ry="4" width="1000" height="15" />
                <rect x="170" y="160" rx="4" ry="4" width="1000" height="15" />
                <rect x="170" y="190" rx="4" ry="4" width="1000" height="15" />
                <rect x="170" y="220" rx="4" ry="4" width="1000" height="15" />
                <rect x="170" y="250" rx="4" ry="4" width="1000" height="15" />
                <rect x="170" y="290" rx="4" ry="4" width="1000" height="15" />
                <rect x="170" y="320" rx="4" ry="4" width="1000" height="15" />
                <rect x="170" y="350" rx="4" ry="4" width="1000" height="15" />
                
            </ContentLoader>
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