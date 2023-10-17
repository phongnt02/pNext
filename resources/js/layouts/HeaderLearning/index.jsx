import { NavLink } from 'react-router-dom';
import classNames from 'classnames/bind';
import styles from './HeaderLearning.module.scss'
// import images from '../../assets/image'
import Manager from '../../components/Manager';

const cx = classNames.bind(styles)


function HeaderLearning({children}) {

    return (
        <div className="layout">
            <header className={cx('wrapper')}>
                <NavLink to='/' className={cx('logo')}>
                    <img src={images.logo} alt="error"></img>
                </NavLink>
                <Manager/>
            </header>
            <section>
                {children}
            </section>
        </div>
    );
}

export default HeaderLearning;