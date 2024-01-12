import { useState } from "react";
import { faAngleLeft, faAngleRight } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import classNames from "classnames/bind";
import styles from './DynamicOptions.module.scss';
import PopperHeadless from "../Popper/PopperHeadless";

const cx = classNames.bind(styles)

function DynamicOptions({ children, data }) {
    const [listOptions, setListOptions] = useState([data]);
    const currentListOptions = listOptions[listOptions.length - 1];

    const options = (
        <div className={cx('popper-wrapper')}>
            {listOptions.length > 1 && (
                <div className="w-full py-4 px-5 text-white text-2xl flex justify-between items-center border-solid border-b"
                    onClick={() => {
                        setListOptions(prev => prev.slice(0,prev.length - 1 ));
                    }}
                >
                    <FontAwesomeIcon icon={faAngleLeft}></FontAwesomeIcon>
                    <span className="pr-4">Quay lại</span>
                </div>
            )}
            {currentListOptions.map((settings) => {
                const isChildren = !!settings.children
                return (
                    <div key={settings.id}
                        className={cx('popper-item', 'flex justify-between items-center')}
                        onClick={() => {
                            if (isChildren) {
                                setListOptions(prev => [...prev, settings.children]);
                            }
                            else {
                                settings.onClick()
                                setListOptions(prev => prev.slice(0,prev.length - 1 ));
                            }
                        }}
                    >
                        {settings.label}
                        {settings.children && (<FontAwesomeIcon icon={faAngleRight}></FontAwesomeIcon>)}
                    </div>
                )
            })}
        </div>
    )

    return (
        <PopperHeadless htmlRender={options} className={cx('popper')}>
            {children}
        </PopperHeadless>
    )
}

export default DynamicOptions;