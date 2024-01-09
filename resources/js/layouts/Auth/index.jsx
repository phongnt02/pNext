import 'animate.css';

function Auth({ children }) {
    return (
        <div className="w-full h-screen relative bg-opacity-50 bg-gray-700 bg-blend-multiply bg-cover bg-no-repeat bg-[url('https://upload.wikimedia.org/wikipedia/commons/0/09/B%E1%BB%9D_%C4%91%C3%B4ng_c%E1%BA%A7u_R%E1%BB%93ng.jpg')]">
            <div className="absolute md:top-10 2xl:top-56 left-1/3 animate__animated animate__fadeInDown md:max-w-[500px] 2xl:max-w-[600px] 2xl:min-h-[500px] p-14 bg-white shadow rounded-xl">
                {children}
            </div>
        </div>
    );
}

export default Auth; 