import React, { useMemo } from 'react';
import Tippy from '@tippyjs/react';

function Popper({children, content}) {

    const html = useMemo(() => (
        <span className="px-3 py-2 bg-black rounded-xl text-white text-xl font-normal">{content}</span>
    ),[content]);

    return (
        <Tippy 
            content={html}
            placement="right-end"
            interactive
            hideOnClick={true}
            arrow={false}
        >
            {children}
        </Tippy>
    );
}

export default Popper;