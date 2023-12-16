import VerificationLayout from "../../layouts/VerificationLayout";

const registerForm = {
    feature:'Đăng ký tài khoản',
    typeForm: 'register',
    listInput :[
        {
            type:'text',
            placeholder:'Số điện thoại*',
            filed:'phone'

        },
        {
            type:'text',
            placeholder:'Tên đăng nhập*',
            filed:'user_name'

        },
        {
            type:'email',
            placeholder:'Email*',
            filed:'email'
        },
        {
            type:'text',
            placeholder:'Họ và tên',
            filed:'full_name'
        },
        {
            type:'password',
            placeholder:'Mật khẩu',
            filed:'password'
        },
        {
            type:'date',
            placeholder:'Ngày/tháng/năm',
            filed:'dob'
        }
    ],
    statusAccount:[
        {
            name:'Đăng nhập',
            to:"/login"
        }
    ],
    nameBtn : 'Đăng ký'
}
function Register() {
    return (
        <VerificationLayout form={registerForm}/>
    );
}

export default Register;