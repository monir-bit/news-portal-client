import React from 'react';
import Image from "next/image";
import { FaPlay } from "react-icons/fa6";
import {SectionLayoutPositionedNewsType} from "@/types/section-layout-positioned-news-type";

type PropTypes = {
    newsData: SectionLayoutPositionedNewsType[];
}

const HomeVideoNews = ({newsData } : PropTypes) => {
    return (
        <div className="grid grid-cols-4 gap-2">
            {newsData.map((item, index) => {
                const news = item.news;
                return (
                    <div
                        key={index}
                        className="group cursor-pointer flex gap-2 border-r border-slate-300 bg-white dark:bg-slate-800/50 transition-all duration-300"
                    >
                        <div className="relative overflow-hidden  shadow-md hover:shadow-xl transition-all duration-300 shrink-0">
                            <div className="relative w-16 h-16">
                                <Image
                                    fill
                                    sizes="128px"
                                    src={news.image}
                                    alt={`Video news ${index + 1}`}
                                    className="object-cover group-hover:scale-105 transition-transform duration-300"
                                />
                            </div>
                        </div>

                        <div className="flex-1 gap-2 item flex items-start">
                            <FaPlay/>
                            <h3 className="text-sm -mt-1 line-clamp-2 font-medium leading-relaxed text-slate-700 dark:text-slate-300 group-hover:text-red-600 transition-colors">
                                {news.title}
                            </h3>
                        </div>
                    </div>
                )
            })}
        </div>
    );

};

export default HomeVideoNews;