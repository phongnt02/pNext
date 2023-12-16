import { useRef } from "react";
import React from "react";
import { Link, useNavigate } from "react-router-dom";
import Cookies from "js-cookie";
import classNames from "classnames/bind";
import { useDispatch, useSelector } from "react-redux";
import { setInforLogin,setInforUser } from "../../ReduxToolkit/authSlice"
import { resetState } from "../../ReduxToolkit/formSlice";
import request from '../../apiService/axiosConfig';
import style from './VerificationLayout.module.scss';
import Button from '../../components/Button';
import Input from "../../components/Input";

const cx = classNames.bind(style)

function VerificationLayout({form}) {
    const navigate =  useNavigate();
    const dispatch = useDispatch()
    const formInput = useSelector((state) => state.form)
    const email = useRef(null)
    const password = useRef(null)
    const submitBtn = useRef(null)

    const handleSubmit = async () => {
        if(form.typeForm == 'login'){
            const data = {
                email: email.current.value,
                password:password.current.value,
            }
            const response  = await request.post('login/',data)
            if(response.data) {
                const expires = new Date(Date.now() + 3600 * 1000 * 24)
                Cookies.set('Token_login',response.data.access_token, {expires: expires })
                dispatch(setInforLogin({isLogged : true, token : Cookies.get('Token_login')}))
                dispatch(setInforUser({name : response.data.full_name, email : data.email}))
                setTimeout(() => {
                    navigate('/')
                }, 1500);
            }
        }
        else if(form.typeForm == 'register'){
            const response = await request.post('register/',formInput)
            if(response.data) {
                dispatch(resetState())
                setTimeout(() => {
                    navigate('/login')
                }, 1500);
            }

        }
    }

    const handleEnter = (e) => {
        if(e.key === 'Enter') {
            submitBtn.current.click()
        }
    }
    return (
        <div className={cx('wrapper')}>
            <div className={cx('form')} onKeyDown={handleEnter}>
                <header className={cx('header')}>
                    <h3 className={cx('feature')}>{form.feature}</h3>
                    <Link to="/">
                        <img src={image.logo} className={cx('logo')}></img>
                    </Link>
                </header>
                <section>
                    <div className={cx('list-input')}>
                        {form.listInput.map((item,index)=>(
                            <Input ref={(item.type == 'email' && email) || (item.type == 'password' && password) || null} 
                            key={index} 
                            type={item.type} 
                            placeholder={item.placeholder}
                            filed={item.filed}
                            ></Input>
                        ))}
                    </div>
                    <div className={cx('status-account')}>
                        {form.statusAccount.map((item,index)=>(
                            <Link key={index} to={item.to}>{item.name}</Link>
                        ))}
                    </div>
                    <Button primary large 
                    className={cx('btn')} onClick={handleSubmit} ref={submitBtn}
                    >{form.nameBtn}</Button>
                    <div className={cx('list-option')}>
                        <Link to="/" className={cx('option')}>Trang chủ</Link>
                        <Link to="/courses" className={cx('option')}>Khóa học</Link>
                    </div>
                </section>
            </div>
        </div>
    );
}

export default VerificationLayout;