import React from "react";
import { useEffect, useState } from "react";
import classNames from "classnames/bind";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faEnvelope, faEye, faEyeSlash, faMagnifyingGlass } from "@fortawesome/free-solid-svg-icons";
import style from './Input.module.scss';
import Button from '../Button'


const cx = classNames.bind(style)

const Input = React.forwardRef(({type, placeholder, onDataInput, onSubcribe, className}, ref) => {
    const [Type,setType] = useState(type)
    const [showPass,setShowPass] = useState(false)
    const [isEmail,setIsEmail] = useState(true)
    const [inputValue,setInputValue] = useState('')


    useEffect(()=>{
        if(type == 'email' || type == 'search' || type == 'verify'){
            setType('text')
        }
    },[])

    useEffect(()=>{
        if(showPass && type == 'password') {
            setType('text')
        }
        else if(!showPass && type == 'password'){
            setType('password')
        }
    },[showPass])

    const handleChangeInput = (e) => {
        const value = e.target.value
        if(!value.startsWith(' ')) {
            setInputValue(value)
            onDataInput(value)  
        }
    }

    const handleBlur = () => {
        if(type == 'email' && inputValue.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
            setIsEmail(true)
        }
        else {
            setIsEmail(false)
        }
    }

    const handleReceivedNews = (email) => {
        console.log(email);
        setInputValue('')
    }

    return (
        <div className={cx('input-parent')}>
            <input type={Type} placeholder={placeholder} ref={ref}
            className={cx('input',className , {'input-search' : type == 'search'})} 
            onBlur={handleBlur}
            value={inputValue} 
            onChange={(e) => handleChangeInput(e)} />
            {type != 'search' && <label className={cx('label')}>{placeholder}</label>}
            {type == 'password' && (
                <span className={cx('icon')} onClick={()=> setShowPass(prev => !prev)}>
                    {showPass && <FontAwesomeIcon icon={faEye}></FontAwesomeIcon> }
                    {!showPass && <FontAwesomeIcon icon={faEyeSlash}></FontAwesomeIcon> }
                </span>
            )}
            {type == 'search' && (
                <span className={cx('icon')}>
                    <FontAwesomeIcon icon={faMagnifyingGlass}></FontAwesomeIcon>
                </span>
            )}
            {type == 'email' && !isEmail && (
                <span className={cx('validation-email')}>
                    Vui lòng nhập đúng định dạng email
                </span>
            )}
            {onSubcribe && (
                <>
                    <Button onClick={() => handleReceivedNews(inputValue)} className={cx('received')} primary small><FontAwesomeIcon icon={faEnvelope}/></Button>
                </>
            )}
        </div>
    );
})

export default Input;