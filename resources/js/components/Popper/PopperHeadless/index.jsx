import React from 'react';
import Tippy from '@tippyjs/react/headless'
import Wrapper from '../Wrapper';

function PopperHeadless({children, htmlRender, className}) {
    return (
        <Tippy
            // visible
            interactive
            // hideOnClick
            placement="bottom-start"
            render={attrs => (
                <div className="box" tabIndex="-1" {...attrs}>
                    <Wrapper className={className}>
                        {htmlRender}
                    </Wrapper>
                </div>
            )}
        >
            {children}
        </Tippy>
    );
}

export default PopperHeadless;