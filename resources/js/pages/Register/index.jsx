import 'flowbite';
import Auth from "../../layouts/Auth";
import { Link } from "react-router-dom";
import Input from '../../components/Input';
import Button from '../../components/Button';
const listFields = [
    {
        label: 'Địa chỉ email',
        name: 'email',
        placeholder: '',
        type: 'email',
    },
    {
        label: 'Họ tên',
        name: 'fullname',
        placeholder: '',
        type: 'text',
    },
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
    },
    {
        label: 'Số điện thoại',
        name: 'phone',
        placeholder: '',
        type: 'text',

    },
    {
        label: 'Ngày sinh',
        name: 'dob',
        placeholder: '',
        type: 'text',
    },
];

function Register() {
    const registerUser = (e) => {
        e.preventDefault();
    }

    return (
        <Auth>
            <div className="w-full h-full">
                <h3 className="text-4xl mb-6">Tạo tài khoản</h3>
                <p className="text-3xl text-gray-500 font-light not-italic font-sans">Bắt đầu trang web của bạn sau vài giây. Bạn đã có tài khoản? <br></br> Đăng nhập 
                    <Link className="text-sky-500" to="/login"> tại đây.</Link></p>

                <form action="/login" method="POST" onClick={registerUser} className="grid gap-10 md:grid-cols-2 w-full mt-6 py-4">
                    {listFields.map((item, index) => (
                        <Input key={index} label={item.label} type={item.type} name={item.name} placeholder={item.placeholder}></Input>
                    ))}
                    <div className="w-full flex items-center justify-between col-span-2">
                        <label className="inline-block font-thin text-xl text-gray-600" htmlFor="remmember_login">
                            <span>Chấp nhận các điều khoản của chúng tôi</span>
                            <input className="w-6 h-6 ml-2 mb-1 border border-solid border-gray-300 rounded-md" type="checkbox" id="remmember_login" name="remmember_login"></input>
                        </label>
                    </div>
                    <Button primary large className="!m-0 col-span-2">Tạo tài khoản</Button>
                </form>
            </div>
        </Auth>
    );
}

export default Register;