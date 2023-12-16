import Header from '../Header';
import SideBar from '../SideBar';

function OnlyHeader({children}) {
    return (
        <div className="w-full h-screen flex">
            <SideBar/>
            {/* <Header></Header> */}
            <main className="flex-1">
                {children}
            </main>
        </div>
    );
}

export default OnlyHeader;