import React from 'react';
import {formatBanglaDate} from "@/lib/bn-date";
import {BiSearch} from "react-icons/bi";
import logo from '@/assets/images/logo.png';
import Image from "next/image";
import Link from "next/link";


const Header = () => {
    const date = new Date();
    return (
        <Link href={'/'} className='border-b border-slate-200 dark:border-slate-700'>
            <div className='flex py-5 justify-between items-center'>
                <time className='text-base text-slate-600 dark:text-slate-400 font-medium'>
                    {formatBanglaDate(date)}
                </time>

                <Image src={logo} alt={'আগামীর সময়'}/>

                <button className='flex items-center justify-center w-10 h-10 rounded-full hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors text-slate-700 dark:text-slate-300'>
                    <BiSearch className='text-xl' />
                </button>
            </div>
        </Link>
    );
};

export default Header;