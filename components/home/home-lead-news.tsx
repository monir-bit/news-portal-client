import React from 'react';
import Image from "next/image";
import {SectionLayoutPositionedNewsType} from "@/types/section-layout-positioned-news-type";
import Link from "next/link";
import {urlGenerator} from "@/lib/utils";
import {banglaTimeAgo} from "@/lib/bn-date";
import ShowTime from "@/components/shared/show-time";
import HtmlContent from "@/components/shared/html-content";
type PropTypes = {
    newsData: SectionLayoutPositionedNewsType[];
}
const HomeLeadNews = ({newsData}: PropTypes) => {
    const firstNews = newsData.filter(news => news.position === 1).slice(0,1);
    const otherNews = newsData.filter(news => news.position !== 1).map(item => item.news);

    return (
        <div className='grid grid-cols-1 md:grid-cols-12 gap-6 mb-8'>
            {firstNews.map(newsData => {
                const news = newsData.news;
                return (
                    <Link prefetch key={news.slug} href={urlGenerator(news.url)} className='col-span-12 md:col-span-6 flex flex-col gap-4 group cursor-pointer'>
                        <div className=" transition-all duration-300">
                            <Image
                                width={500}
                                height={300}
                                className="w-full h-auto object-cover transition-transform duration-500"
                                priority
                                src={news.image}
                                alt={''}/>
                        </div>

                        <h1 className=' line-clamp-2 text-2xl md:text-2xl font-bold text-slate-800 dark:text-slate-100 group-hover:text-red-600 transition-colors leading-snug'>
                            {news.title}
                        </h1>
                        <p className='line-clamp-3 text-slate-600 dark:text-slate-400 leading-relaxed text-base'>
                            {news?.sort_description}
                        </p>
                        <ShowTime time={banglaTimeAgo(news.date)}/>
                    </Link>
                )
            })}

            <div className='col-span-12 md:col-span-3'>
                <div className="flex flex-col gap-4">
                    {otherNews.map((news, index) => (
                        <Link
                            prefetch
                            href={urlGenerator(news?.url)}
                            key={index}
                            className='group cursor-pointer pb-4 border-b border-slate-200 dark:border-slate-700 last:border-b-0 hover:bg-slate-50 dark:hover:bg-slate-800/30 transition-all duration-300 p-3'
                        >
                            <h3 className="text-base font-bold line-clamp-2 leading-snug text-slate-800 dark:text-slate-200 group-hover:text-red-600 transition-colors mb-3">
                                {news.title}
                            </h3>

                            <div className="flex gap-3">
                                <div className="flex-1">
                                    <div className='line-clamp-2 text-sm text-slate-600 dark:text-slate-400 leading-relaxed'>
                                        <HtmlContent content={news.sort_description}/>
                                    </div>
                                    <ShowTime time={banglaTimeAgo(news.date)}/>
                                </div>

                                <div className="relative overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 shrink-0">
                                    <div className="relative h-[75px] w-[125px]">
                                        <Image
                                            height={150}
                                            width={250}
                                            src={news.image}
                                            alt={news.title}
                                            className="object-cover group-hover:scale-110 transition-transform duration-300"
                                        />
                                    </div>
                                </div>
                            </div>
                        </Link>
                    ))}
                </div>
            </div>
            {/*Advertise section*/}
            <div className='col-span-12 md:col-span-3'>
                <div className="flex flex-col gap-4">
                    <div className="relative group cursor-pointer overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">
                        <div className="absolute top-2 left-2 bg-slate-900/70 text-white text-xs px-2 py-1 rounded z-10">
                            বিজ্ঞাপন
                        </div>
                        <Image
                            width={300}
                            height={300}
                            className="w-full h-auto object-cover group-hover:scale-105 transition-transform duration-300"
                            src='https://media.licdn.com/dms/image/v2/C4E22AQHHgrDHSEw7hQ/feedshare-shrink_800/feedshare-shrink_800/0/1609433158972?e=2147483647&v=beta&t=xDVVGOu6bWtrp1Bv2GPoflY1l-80NbRdBHQ73iuMkTU'
                            alt={'Advertisement'}
                        />
                    </div>

                    <div className="relative group cursor-pointer overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">
                        <div className="absolute top-2 left-2 bg-slate-900/70 text-white text-xs px-2 py-1 rounded z-10">
                            বিজ্ঞাপন
                        </div>
                        <Image
                            width={300}
                            height={300}
                            className="w-full h-auto object-cover group-hover:scale-105 transition-transform duration-300"
                            src='https://media.licdn.com/dms/image/v2/C4E22AQHHgrDHSEw7hQ/feedshare-shrink_800/feedshare-shrink_800/0/1609433158972?e=2147483647&v=beta&t=xDVVGOu6bWtrp1Bv2GPoflY1l-80NbRdBHQ73iuMkTU'
                            alt={'Advertisement'}
                        />
                    </div>
                </div>
            </div>
        </div>
    );
};

export default HomeLeadNews;