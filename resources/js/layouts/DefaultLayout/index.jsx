import React from "react";
import SideBar from "../SideBar";
import Footer from '../Footer';

function DefaultLayout({children}) {
    return (
        <div className="w-full">
            {/* <Header></Header> */}
            <SideBar/>
            <section className="w-full flex justify-center flex-col items-center">
                {children}
            </section>
            <Footer></Footer>
        </div>
    );
}

export default DefaultLayout;