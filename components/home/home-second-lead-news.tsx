import React from 'react';
import Image from "next/image";
import {IoTimeOutline} from "react-icons/io5";
import {SectionLayoutPositionedNewsType} from "@/types/section-layout-positioned-news-type";
type PropTypes = {
    newsData: SectionLayoutPositionedNewsType[];
}
const HomeSecondLeadNews = ({newsData}: PropTypes) => {
    return (
        <div className='grid gap-3 grid-cols-4'>
            {newsData.map((item, index) => {
                const news = item.news;
                return (
                    <div key={index} className='flex border border-slate-200 p-3 flex-col gap-2 group cursor-pointer'>
                        <div className=" transition-all duration-300">
                            <Image
                                width={600}
                                height={400}
                                className="w-full rounded h-auto object-cover transition-transform duration-500"
                                priority
                                src={news.image}
                                alt={''}/>
                        </div>

                        <h1 className=' line-clamp-2 text-lg font-bold text-slate-800 dark:text-slate-100 group-hover:text-red-600 transition-colors leading-snug'>
                            {news.title}
                        </h1>
                        <p className='text-sm text-slate-500 dark:text-slate-400 flex items-center gap-1'>
                            <IoTimeOutline className="text-base" />
                            <span>৩ ঘন্টা আগে</span>
                        </p>
                    </div>
                )
            })}
        </div>
    );
};

export default HomeSecondLeadNews;