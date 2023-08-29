import useMeasure from 'react-use-measure'  // library third-party
import { NavLink } from 'react-router-dom'
import classNames from 'classnames/bind';
import style from './Menu.module.scss';

const cx = classNames.bind(style)

function MenuItem({title, to}) {
    const [widthItemRef,{width}] = useMeasure()

    return (
        <NavLink ref={widthItemRef} to={to} className={(nav) => cx('menu-item',{ active: nav.isActive})}>
            <span>{title}</span>
            <span className={cx('line')} style={{width}}></span>
        </NavLink>
    );
}

export default MenuItem;