import { useEffect, useState } from 'react';
import { Link, useNavigate } from 'react-router-dom';
import Cookies from 'js-cookie';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faAngleLeft } from '@fortawesome/free-solid-svg-icons';
import { useSelector,useDispatch } from 'react-redux';
import { setInforLogin } from '../../ReduxToolkit/authSlice'
import request from "../../apiService/axiosConfig";
import PopperHeadless from '../Popper/PopperHeadless'
import classNames from 'classnames/bind';
import styles from './Manager.module.scss'

const cx = classNames.bind(styles)

const MENU_ITEMS = [
    {
        title:"Khóa học của tôi",
        to:'/feedback'
    },
    {
        title:"Hồ sơ học tập",
        to:'/history'
    },
    {
        title:"Cài đặt",
        children : [
            {
                title:'Tài khoản',
                to:'/profile'
            },
            {
                title:'Phản hồi & Trợ giúp',
                to:'/help'
            },
            {
                title:'Thiết lập ngôn ngữ',
                children:[
                    {
                        title:'Tiếng Việt',
                        code:'vi'
                    },
                    {
                        title:'Tiếng Anh',
                        code:'en'
                    },
                    {
                        title:'Tiếng Nhật',
                        code:'ja'
                    }
                ]
            }
        ]
    },
    {
        title:"Đăng xuất",
        to:'/login'
    },
]
function Manager() {
    const [options,setOptions] = useState([MENU_ITEMS])
    const currentOption = options[options.length - 1]

    const dispatch = useDispatch()
    const navigate = useNavigate()
    const user = useSelector(state => state.auth.user)
    const isLogged = useSelector(state => state.auth.isLogged)

    useEffect(()=>{
        const token = Cookies.get('Token_login')
        if(isLogged || token){
            const handleReLogin = async () => {
                const response = await request.get('getUserInfor/', {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                })
                dispatch(setInforLogin({ isLogged: true, token: token }))
            }

            handleReLogin()
        }
        else {
            navigate('/login')
        }
    },[])

    const handleClick = (item) => {
        const isParrent = !!item.children
        if(isParrent) {
            setOptions((prev) => [...prev,item.children])
        }
    }

    const onBack = () => {
        setOptions((prev) => prev.slice(0,prev.length - 1))
    }
    
    const handleLogout = async () => {
        const response = await request.post('logout/', {} ,{
            headers : {
                'Authorization':`Bearer ${Cookies.get('Token_login')}`,
            }
        })
        if(response.data.message == 'Logged out successfully') {
            Cookies.remove('Token_login')
            dispatch(setInforLogin({isLogged : false, token : null}))
        }
    }

    const htmlRender = (
        <div className={cx('menu')}>
           <Link className={cx('profile','menu-item')}>
                {/* <div className={cx('name')}>{user.name}</div> */}
                {/* <div className={cx('nickname')}>{user.email}</div> */}
           </Link>
            {options.length > 1 && (
                <div className={cx('menu-item')}>
                    <span className={cx('backBtn')} onClick={onBack}>
                        <FontAwesomeIcon icon={faAngleLeft}/>
                    </span>
                    <span className={cx('backTitle')}>Quay lại</span>
                </div>
            )}
           {currentOption.map((item,index) => (
                <Link key={index} to={item.to} 
                className={cx('menu-item',{'logout':item.title == 'Đăng xuất'})} 
                onClick={() => {
                    handleClick(item)
                    if(item.title == 'Đăng xuất') {
                        handleLogout()
                    }
                }}
                >{item.title}</Link>
           ))}
        </div>
    )

    return (
        <div className={cx('account')}>
            <PopperHeadless htmlRender={htmlRender} className={cx('customBox')}>
                <img className={cx('avatar')} src="https://img.freepik.com/free-icon/user_318-749758.jpg?w=2000"></img>
            </PopperHeadless>
        </div>
    );
}

export default Manager;