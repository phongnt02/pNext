import classNames from "classnames/bind";
import styles from './Video.module.scss';

const cx = classNames.bind(styles)

function Video({videoData, thumbnailCourse}) {
    return (
        <div className={cx('video')}>
            <h3 className={cx('title')}>{(videoData != null) ? (videoData.lesson_name) : 'Bắt đầu khóa học'}</h3>
            {(videoData != null) ?
                (<iframe width="700" height="400" src={videoData.lesson_video_url} title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>)
                :
                (<img src={thumbnailCourse} width="700" height="400"></img>)}
        </div>
    );
}

export default Video;