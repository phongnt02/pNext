import { useRef, useState, useCallback, memo, useEffect } from "react";
import { FullScreen, useFullScreenHandle } from "react-full-screen";
import { faBackwardStep, faCompress, faExpand, faForwardStep, faGaugeSimple, faGear, faPlay, faRotateBack, faRotateForward, faStop, faVolumeHigh, faVolumeXmark } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import classNames from "classnames/bind";
import styles from './Video.module.scss';
import PopperHeadless from "../Popper/PopperHeadless";
import Loading from "../Loading";

const cx = classNames.bind(styles)

function Video({dataVideo}) {
    const video = useRef(null);
    const [isLoading, setIsLoading] = useState(true);
    const [isPlay, setIsPlay] = useState(false);
    const [currentTime, setCurrentTime] = useState(0);
    const [isMutes, setIsMutes] = useState(false);
    const [currentSpeed, setCurrentSpeed] = useState(1.0);
    const [currentVolume, setCurrentVolume] = useState(100);
    const [isFullScreen, setIsFullScreen] = useState(false);
    const handleFullScreen = useFullScreenHandle();

    useEffect(() => {
        const videoElement = video.current;

        const handleDataLoaded = () => {
            setIsLoading(false);
            setCurrentTime(0);
            setIsPlay(false);
        };

        if (videoElement) {
            videoElement.addEventListener('loadeddata', handleDataLoaded);
            setIsLoading(true);
            return () => {
                videoElement.removeEventListener('loadeddata', handleDataLoaded);
            };
        }
    }, [dataVideo]);

    // defind list btn for controls
    const handlePlay = () => {
        if (video.current.paused) {
            video.current.play();
            setIsPlay(true);
        } else {
            video.current.pause();
            setIsPlay(false);
        }
    }

    const handleChange = (e) => {
        let value = e.target.value
        value = isNaN(value) ? '' : String(value);
        setCurrentTime(value)
        video.current.currentTime = (video.current.duration * value) / 100
    }

    const handleTimeUpdate = () => {
        const percentVideo = Math.floor((video.current.currentTime / video.current.duration) * 100)
        setCurrentTime(percentVideo)
    }

    const setTime = (mode) => {
        if (mode == 'back') {
            video.current.currentTime = video.current.currentTime - 10
        }
        else if (mode == 'next') {
            video.current.currentTime = video.current.currentTime + 10
        }
        handleTimeUpdate()
    }

    const setMutes = () => {
        video.current.muted = !video.current.muted
        setIsMutes(prev => !prev)
        setCurrentVolume(isMutes ? 100 : 0)
    }

    const setVolumn = (e) => {
        const volume = e.target.value
        video.current.volume = volume / 100
        setCurrentVolume(volume)

        if (volume > 1) {
            setIsMutes(false)
        } else if (volume == 1) {
            setIsMutes(true)
        }
    }

    const setSpeeds = (speed) => {
        video.current.playbackRate = speed;
        setCurrentSpeed(speed)
    };
    // config full screen
    const reportChange = useCallback((state, handle) => {
        if (handle === handleFullScreen) {
            setIsFullScreen(state);
        }
    }, [handleFullScreen]);

    const speeds = [0.25, 0.5, 1, 1.5, 2];

    const SpeedOption = (
        <>
            <span className={cx('speed-current')}>Tốc độ phát hiện tại : {currentSpeed}</span>
            <div className={cx('speeds-popper')}>
                {speeds.map((speed) => (
                    <span className={cx('speed-item')} key={speed} onClick={() => setSpeeds(speed)}>
                        {speed}
                    </span>
                ))}
            </div>
        </>
    );
    return (
        <div className={cx('content')}>
            <FullScreen handle={handleFullScreen} onChange={reportChange}>
                <video ref={video} className={cx('video')} src={dataVideo.path_video}
                    onClick={handlePlay}
                    onTimeUpdate={handleTimeUpdate}
                ></video>
                {isLoading && (
                    <div className={cx('loading')}>
                        <Loading></Loading>
                    </div>
                )}
                <div className={cx('controls')}>
                    <input name="progress" type="range" min="1" max="100"
                        className={cx('duration')}
                        value={currentTime}
                        onChange={handleChange}
                    ></input>
                    <div className="h-16 w-full flex justify-between items-center text-white">
                        <div className="controls-left">
                            <button className={cx('previous', 'btn')}><FontAwesomeIcon icon={faBackwardStep}></FontAwesomeIcon></button>
                            <button onClick={handlePlay} className={cx('play', 'btn')}>
                                {isPlay ? <FontAwesomeIcon icon={faStop}></FontAwesomeIcon> : <FontAwesomeIcon icon={faPlay}></FontAwesomeIcon>}
                            </button>
                            <button className={cx('next', 'btn')}><FontAwesomeIcon icon={faForwardStep}></FontAwesomeIcon></button>
                            <button className={cx('back-10-seconds', 'btn')}
                                onClick={() => setTime('back')}
                            ><FontAwesomeIcon icon={faRotateBack}></FontAwesomeIcon></button>
                            <button className={cx('next-10-seconds', 'btn')}
                                onClick={() => setTime('next')}
                            ><FontAwesomeIcon icon={faRotateForward}></FontAwesomeIcon></button>
                            <span className={cx('mutes', 'btn')}>
                                <button className="w-6" onClick={(setMutes)}>
                                    {isMutes ? <FontAwesomeIcon icon={faVolumeXmark}></FontAwesomeIcon> : <FontAwesomeIcon icon={faVolumeHigh}></FontAwesomeIcon>}
                                </button>
                                <input type="range" min='1' max="100" 
                                    className={cx('volume')}
                                    value={currentVolume}
                                    onChange={setVolumn}
                                />
                            </span>
                        </div>
                        <div className={cx('control-right')}>
                            <button className={cx('speeds', 'btn')}>
                                <PopperHeadless htmlRender={SpeedOption} className={cx('speeds-tippy')}>
                                    <FontAwesomeIcon icon={faGaugeSimple}></FontAwesomeIcon>
                                </PopperHeadless>
                            </button>
                            <button className={cx('settings', 'btn')}><FontAwesomeIcon icon={faGear}></FontAwesomeIcon></button>
                            {isFullScreen ? (
                                <button className={cx('full-screen', 'btn')}
                                    onClick={handleFullScreen.exit}
                                ><FontAwesomeIcon icon={faCompress}></FontAwesomeIcon></button>
                            ) : (
                                <button className={cx('full-screen', 'btn')}
                                    onClick={handleFullScreen.enter}
                                ><FontAwesomeIcon icon={faExpand}></FontAwesomeIcon></button>
                            )}
                        </div>
                    </div>
                </div>
            </FullScreen>
        </div>
    );
}

export default memo(Video);