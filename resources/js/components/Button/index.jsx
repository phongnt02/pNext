import React from "react";
import { NavLink } from "react-router-dom";
import classNames from "classnames/bind";
import style from './Button.module.scss';

const cx = classNames.bind(style)


const Button = React.forwardRef(({children, to, href, className, primary, large, medium, small, scale, text , empty, classic, moveTop, onClick, ...isRest}, ref) => {
    let ComponentTag = 'button'
    if(!!to) {
        ComponentTag = NavLink
    } else if (!!href) {
        ComponentTag = 'a'
    }
    const _class = cx('wrapper',{
        primary,
        large,
        medium,
        small,
        scale,
        text,
        empty,
        classic,
        moveTop,
        [className]: !!className
    })
    return (
        <ComponentTag to={to} href={href} className={_class} onClick={onClick} {...isRest} ref={ref}>
            <span>
                {children}
            </span>
        </ComponentTag>
    );
})

export default Button;