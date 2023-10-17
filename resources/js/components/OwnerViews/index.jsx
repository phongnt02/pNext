import classNames from "classnames/bind";
import styles from './OwnerViews.module.scss';
import { useState } from "react";
const cx = classNames.bind(styles)

function OwnerViews({ avatarSrc = null, userName, createdAt }) {
    const [fallbackAvatarSrc, setFallBackAvatar] = useState('/img/user.png')

    return (
        <div className={cx('owner-watch')}>
            <div className={cx('owner-avatar')}>
                <img src={avatarSrc ? avatarSrc : fallbackAvatarSrc} alt="avatar"></img>
            </div>
            <div className={cx('owner-infor')}>
                <span className={cx('user-name')}>{userName}</span>
                <span className={cx('created-at')}>{createdAt}</span>
            </div>
        </div>
    );
}

export default OwnerViews;