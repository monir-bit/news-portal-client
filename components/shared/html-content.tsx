import React from 'react';

const HtmlContent = ({content}: {content: string | null}) => {
    return (
        <div suppressHydrationWarning dangerouslySetInnerHTML={{__html: content  || ''}}></div>
    );
};

export default HtmlContent;