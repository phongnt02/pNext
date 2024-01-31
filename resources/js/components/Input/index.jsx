import 'flowbite';
import React from "react";
import { useEffect, useState } from "react";
import classNames from "classnames/bind";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faEye, faEyeSlash } from "@fortawesome/free-solid-svg-icons";
import style from './Input.module.scss';


const cx = classNames.bind(style)

const Input = React.forwardRef(({ type, label, placeholder, onDataInput, className, name }, ref) => {
    const [Type, setType] = useState(type)
    const [showPass, setShowPass] = useState(false)
    const [isEmail, setIsEmail] = useState(true)
    const [inputValue, setInputValue] = useState('')

    useEffect(() => {
        if (showPass && type === 'password') {
            setType('text');
        } else if (!showPass && type === 'password') {
            setType('password');
        } else if (['email', 'search', 'verify'].includes(type)) {
            setType('text');
        }
    }, [type, showPass]);

    const handleChangeInput = (e) => {
        const value = e.target.value
        if (!value.startsWith(' ')) {
            setInputValue(value)
            onDataInput(value, name)
        }
    }

    const handleBlur = () => {
        setIsEmail(false)
        if (type == 'email' && inputValue.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
            setIsEmail(true)
        }
    }
    
    const renderValidateAndEvent = () => {
        switch (type) {
            case 'email':
                return !isEmail && (
                    <p className="mt-4 text-xl text-red-500 dark:text-red-500">Vui lòng nhập đúng định dạng email</p>
                );
            case 'search':
                return;
            case 'password':
                return (
                    <span className={cx('absolute top-1/2 right-6 cursor-pointer translate-y-2')} onClick={() => setShowPass(prev => !prev)}>
                        {showPass && <FontAwesomeIcon icon={faEye}></FontAwesomeIcon>}
                        {!showPass && <FontAwesomeIcon icon={faEyeSlash}></FontAwesomeIcon>}
                    </span>
                )
            default:
        }
    }

    return (
        <div className={cx('relative')}>
            {type != 'search' && (<label className={cx('block mb-3 text-2xl font-bold text-gray-900 dark:text-white')} htmlFor={name}>{label}</label>)}
            <input type={Type} placeholder={placeholder} ref={ref}
                id={name}
                name={name}
                value={inputValue}
                className={cx({'text-xl w-full p-5 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500' : type != 'search'}
                , className
                , { 'block w-[280px] h-16 p-3 ps-10 text-2xl text-gray-900 border border-gray-600 rounded-xl focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 shadow': type == 'search' })}
                onBlur={handleBlur}
                onChange={(e) => handleChangeInput(e)} />
            {renderValidateAndEvent()}
        </div>
    );
})

export default Input;