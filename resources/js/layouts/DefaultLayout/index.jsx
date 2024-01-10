import React from "react";
import Header from '../Header'
import SideBar from "../SideBar";
import Footer from '../Footer';

function DefaultLayout({children}) {
    return (
        <div className="w-full">
            <Header></Header>
            <SideBar/>
            <section className="w-full flex justify-center flex-col items-center mt-[70px]">
                {children}
            </section>
            <Footer></Footer>
        </div>
    );
}

export default DefaultLayout;