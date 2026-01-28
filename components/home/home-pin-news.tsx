import React from 'react';
import Image from "next/image";
import {SectionLayoutPositionedNewsType} from "@/types/section-layout-positioned-news-type";
type PropTypes = {
    newsData: SectionLayoutPositionedNewsType[];
}
const HomePinNews = ({newsData}: PropTypes) => {
    return (
        <div className="grid grid-cols-4 gap-2">
            {newsData.map((item, index) =>{
                const news = item.news;
                return (
                    <div
                        key={index}
                        className="group cursor-pointer flex border p-2 border-slate-100 bg-white dark:bg-slate-800/50 transition-all duration-300"
                    >
                        <div className="relative overflow-hidden transition-all duration-300 flex-shrink-0">
                            <div className="relative w-16 h-16">
                                <Image
                                    fill
                                    sizes="128px"
                                    src={news.image}
                                    alt={`Video news ${index + 1}`}
                                    className="object-cover rounded-full group-hover:scale-105 transition-transform duration-300"
                                />

                            </div>
                        </div>

                        <div className="flex-1 flex items-center">
                            <h3 className="text-sm text-center line-clamp-2 font-medium leading-relaxed text-slate-700 dark:text-slate-300 group-hover:text-red-600 transition-colors">
                                {news.title}
                            </h3>
                        </div>
                    </div>
                )
            })}
        </div>
    );
};

export default HomePinNews;