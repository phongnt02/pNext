import React from 'react';
import Tippy from '@tippyjs/react';

function Popper({children, content}) {
    return (
        <Tippy content={content}>
            {children}
        </Tippy>
    );
}

export default Popper;