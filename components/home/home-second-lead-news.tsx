import React from 'react';
import Image from "next/image";
import {IoTimeOutline} from "react-icons/io5";
import {SectionLayoutPositionedNewsType} from "@/types/section-layout-positioned-news-type";
import Link from "next/link";
import {urlGenerator} from "@/lib/utils";
import {banglaTimeAgo} from "@/lib/bn-date";
import ShowTime from "@/components/shared/show-time";
type PropTypes = {
    newsData: SectionLayoutPositionedNewsType[];
}
const HomeSecondLeadNews = ({newsData}: PropTypes) => {
    return (
        <div className='grid gap-3 grid-cols-4'>
            {newsData.map((item, index) => {
                const news = item.news;
                return (
                    <Link
                        href={urlGenerator(news?.url)}
                        key={index} className='flex border border-slate-200 p-3 flex-col gap-2 group cursor-pointer'
                    >
                        <div className=" transition-all duration-300">
                            <Image
                                width={150}
                                height={100}
                                className="w-full rounded h-auto object-cover transition-transform duration-500"
                                priority
                                src={news.image}
                                alt={''}/>
                        </div>

                        <h1 className=' line-clamp-2 text-lg font-bold text-slate-800 dark:text-slate-100 group-hover:text-red-600 transition-colors leading-snug'>
                            {news.title}
                        </h1>
                        <ShowTime time={banglaTimeAgo(news.date)}/>
                    </Link>
                )
            })}
        </div>
    );
};

export default HomeSecondLeadNews;