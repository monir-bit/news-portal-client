import React from 'react';
import Image from "next/image";
import {IoTimeOutline} from "react-icons/io5";

const HomeSecondLeadNews = () => {
    return (
        <div className='grid gap-3 grid-cols-4'>
            {Array.from({ length: 12 }).map((_, index) => (
                <div key={index} className='flex border border-slate-200 p-3 flex-col gap-2 group cursor-pointer'>
                    <div className=" transition-all duration-300">
                        <Image
                            width={600}
                            height={400}
                            className="w-full rounded h-auto object-cover transition-transform duration-500"
                            priority
                            src='https://media.prothomalo.com/prothomalo-bangla%2F2026-01-27%2F14fpk92f%2FGayshwar.jpg'
                            alt={''}/>
                    </div>

                    <h1 className=' line-clamp-2 text-lg font-bold text-slate-800 dark:text-slate-100 group-hover:text-red-600 transition-colors leading-snug'>পাঁচ শীর্ষ ব্যবসায়ীর সঙ্গে মার্কিন রাষ্ট্রদূতের বৈঠক / দ্বিপাক্ষিক সহযোগিতা বাড়ানোর বিষয়ে আশাবাদি মেঘনা গ্রুপের চেয়ারম্যান মোস্তফা কামাল</h1>
                    <p className='text-sm text-slate-500 dark:text-slate-400 flex items-center gap-1'>
                        <IoTimeOutline className="text-base" />
                        <span>৩ ঘন্টা আগে</span>
                    </p>
                </div>
            ))}
        </div>
    );
};

export default HomeSecondLeadNews;