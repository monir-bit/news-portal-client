import React from 'react';
import {IoTimeOutline} from "react-icons/io5";

const ShowTime = ({time}: {time: string}) => {
    return (
        <p className='text-sm text-slate-500 dark:text-slate-400 flex items-center gap-1'>
            <IoTimeOutline className="text-base" />
            <span>{time}</span>
        </p>
    );
};

export default ShowTime;