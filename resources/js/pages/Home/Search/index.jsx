import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faMagnifyingGlass } from '@fortawesome/free-solid-svg-icons';
import classNames from "classnames/bind";
import styles from '../Home.module.scss';

const cx = classNames.bind(styles)


function SearchHome() {
    return (
        <div className={cx('search')}>
            <div className={cx('icon_search','center')}>
                <FontAwesomeIcon icon={faMagnifyingGlass} />
            </div>
            <input type="search" id="default-search" className={cx('input_search')} placeholder="Want to learn ?"></input>
            <button type="submit" className={cx('search-btn','center')}>Explore</button>
        </div>
    );
}

export default SearchHome;