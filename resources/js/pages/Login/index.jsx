import VerificationLayout from "../../layouts/components/VerificationLayout";


const loginForm = {
    feature:'Đăng nhập',
    typeForm: 'login',
    listInput :[
        {
            type:'email',
            placeholder:'Tên đăng nhập',

        },
        {
            type:'password',
            placeholder:'Mật khẩu'
        }
    ],
    statusAccount:[
        {
            name:'Đăng ký',
            to:"/register"
        },
        {
            name:'Quên mật khẩu',
            to:"/forgot"
        }
    ],
    nameBtn : 'Đăng nhập'
}
function Login() {
    return (
        <VerificationLayout form={loginForm}></VerificationLayout>
    );
}

export default Login;