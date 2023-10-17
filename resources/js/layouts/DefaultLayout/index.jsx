import React from "react";
import classNames from "classnames/bind";
import style from "./DefaultLayout.scss?inline";
import Header from '../components/Header';
import Footer from '../components/Footer'

const cx = classNames.bind(style)

function DefaultLayout({children}) {
    return (
        <div className={cx('wrapper')}>
            {/* <Header></Header> */}
            <section className="w-full">{children}</section>
            <Footer></Footer>
        </div>
    );
}

export default DefaultLayout;