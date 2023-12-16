import { useEffect } from "react";
import { NavLink } from "react-router-dom";
import classNames from "classnames/bind";
import Cookies from "js-cookie";
import { useSelector, useDispatch } from "react-redux";
import { setInforLogin,setInforUser } from "../../ReduxToolkit/authSlice"
import style from './Header.module.scss'
import Menu from './Menu'
import MenuItem from "./Menu/MenuItem";
import Button from "../../components/Button";
import Manager from "../../components/Manager"
import request from "../../apiService/axiosConfig";
const cx = classNames.bind(style)

function Header() {
    const dispatch = useDispatch()
    const isLogged = useSelector(state => state.auth.isLogged)

    useEffect(() =>{
        const handleReLogin = async () => {
            if(Cookies.get('Token_login') != undefined) {
                const response = await request.get('getUserInfor/',{
                    headers : {
                        'Authorization':`Bearer ${Cookies.get('Token_login')}`,
                    }
                })
                dispatch(setInforLogin({isLogged : true, token : Cookies.get('Token_login')}))
                dispatch(setInforUser({name : response.data.full_name, email : response.data.email}))
            }
        }

        handleReLogin()
    },[])

    return (
        <header className={cx('wrapper')}>
            <NavLink to='/' className={cx('logo')}>
                <img src={images.logo} alt="error"></img>
            </NavLink>
            <Menu>
                <MenuItem title='Trang chủ' to='/'></MenuItem>
                <MenuItem title='Khóa học' to='/courses'></MenuItem>
                <MenuItem title='Thư viện tài liệu' to='/documentlibrary'></MenuItem>
                <MenuItem title='Cộng đồng' to='/community'></MenuItem>
                <MenuItem title='Giải trí' to='/entertainment'></MenuItem>
            </Menu>
            {isLogged ? <Manager/> : (
                <div className={cx('more')}>
                    <Button text small to='/login'>Đăng nhập</Button>
                    <Button primary large scale to='/register'>Đăng ký</Button>
                </div>
            )}
        </header>
    );
}

export default Header;