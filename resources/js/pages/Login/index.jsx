import Auth from "../../layouts/Auth";
import { Link } from "react-router-dom";
import Input from "../../components/Input";
import Button from "../../components/Button";
const listFields = [
    {
        label: 'Tên đăng nhập',
        name: 'user_name',
        placeholder: '',
        type: 'text',

    },
    {
        label: 'Mật khẩu',
        name: 'password',
        placeholder: '',
        type: 'password',
    }
];

function Login() {

    return (
        <Auth>
            <div className="w-full h-full">
                <h3 className="text-4xl mb-6">Chào mừng</h3>
                <p className="text-3xl text-gray-500 font-light not-italic font-sans">Bắt đầu trang web của bạn sau vài giây. Bạn chưa có tài khoản? Hãy đăng ký
                    <Link className="text-blue-500" to="/register"> tại đây.</Link></p>

                <form action="" method="POST" className="grid gap-10 md:grid-cols-1 w-full mt-6 py-4">
                    {listFields.map((item, index) => (
                        <Input key={index} label={item.label} type={item.type} name={item.name} placeholder={item.placeholder}></Input>
                    ))}
                    <div className="w-full flex items-center justify-between">
                        <label className="inline-block font-thin text-xl text-gray-600" htmlFor="remmember_login">
                            <span>Ghi nhớ đăng nhập</span>
                            <input className="w-6 h-6 ml-2 mb-1 border border-solid border-gray-300 rounded-md" type="checkbox" id="remmember_login" name="remmember_login"></input>
                        </label>
                        <Button to="/forget">Quên mật khẩu</Button>
                    </div>
                    <Button primary large className="!m-0">Đăng nhập</Button>
                </form>

                <div className="inline-flex items-center justify-center w-full mt-6">
                    <hr className="w-full h-px my-8 bg-gray-200 border-0 dark:bg-gray-700"></hr>
                    <span className="absolute px-3 text-3xl font-medium text-gray-900 -translate-x-1/2 bg-white left-1/2 dark:text-white dark:bg-gray-900">or</span>
                </div>

                <button type="button" className="w-full h-10 text-2xl px-10 py-9 mt-8 text-center text-black inline-flex items-center justify-center border box-border border-solid border-gray-300 rounded-xl hover:bg-gray-100">
                    <svg className="w-10 h-10" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clipPath="url(#clip0_13183_10121)"><path d="M20.3081 10.2303C20.3081 9.55056 20.253 8.86711 20.1354 8.19836H10.7031V12.0492H16.1046C15.8804 13.2911 15.1602 14.3898 14.1057 15.0879V17.5866H17.3282C19.2205 15.8449 20.3081 13.2728 20.3081 10.2303Z" fill="#3F83F8"></path><path d="M10.7019 20.0006C13.3989 20.0006 15.6734 19.1151 17.3306 17.5865L14.1081 15.0879C13.2115 15.6979 12.0541 16.0433 10.7056 16.0433C8.09669 16.0433 5.88468 14.2832 5.091 11.9169H1.76562V14.4927C3.46322 17.8695 6.92087 20.0006 10.7019 20.0006V20.0006Z" fill="#34A853"></path><path d="M5.08857 11.9169C4.66969 10.6749 4.66969 9.33008 5.08857 8.08811V5.51233H1.76688C0.348541 8.33798 0.348541 11.667 1.76688 14.4927L5.08857 11.9169V11.9169Z" fill="#FBBC04"></path><path d="M10.7019 3.95805C12.1276 3.936 13.5055 4.47247 14.538 5.45722L17.393 2.60218C15.5852 0.904587 13.1858 -0.0287217 10.7019 0.000673888C6.92087 0.000673888 3.46322 2.13185 1.76562 5.51234L5.08732 8.08813C5.87733 5.71811 8.09302 3.95805 10.7019 3.95805V3.95805Z" fill="#EA4335"></path></g><defs><clipPath id="clip0_13183_10121"><rect width="20" height="20" fill="white" transform="translate(0.5)"></rect></clipPath></defs>
                    </svg>
                    <span className="pl-4">Sign in with Google</span>
                </button>
                <button type="button" className="w-full h-10 text-2xl px-10 py-9 mt-8 text-center text-black inline-flex items-center justify-center border box-border border-solid border-gray-300 rounded-xl hover:bg-gray-100">
                    <svg className="w-10 h-10 text-white bg-blue-600 p-1 rounded-xl" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                        <path fillRule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clipRule="evenodd"></path>
                    </svg>
                    <span className="pl-4">Sign in with Google</span>
                </button>
            </div>
        </Auth>
    );
}

export default Login;