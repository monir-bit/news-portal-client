import React from 'react';
import {getNewsByCategory} from "@/services/news.service";
import {NewsByCategoryType} from "@/types/news-by-category-type";
import {NewsListType} from "@/types/news-list-type";
import Image from "next/image";
import {formatBanglaDate} from "@/lib/bn-date";
import HtmlContent from "@/components/shared/html-content";
import {urlGenerator} from "@/lib/utils";
import Link from "next/link";

interface PageProps {
    params: Promise<{
        slug: string;
    }>;
}

const CategoryPage = async ({params}: PageProps) => {
    const slug = (await params).slug
    const categoryNewsData = await getNewsByCategory(slug) as NewsByCategoryType;
    const lead_news: NewsListType[] = categoryNewsData.news_list.lead_news
    const sub_lead_news: NewsListType[] = categoryNewsData.news_list.sub_lead_news
    const others_news: NewsListType[] = categoryNewsData.news_list.others_news

    return (
        <div>

            <section className=" border-b border-slate-300">
                <div className="max-w-7xl mx-auto px-2 py-3">
                    <h1 className="text-3xl md:text-4xl font-bold text-gray-900">
                        {categoryNewsData.category.name}
                    </h1>
                    {/*<p className="text-gray-600 mt-2 max-w-3xl">*/}
                    {/*    Analysis, editorials, and expert opinions on politics, economy, and society.*/}
                    {/*</p>*/}
                </div>
            </section>

            <div className="max-w-7xl mx-auto px-3 py-4 grid grid-cols-1 lg:grid-cols-12 gap-2">

                <main className="lg:col-span-9 space-y-4">

                    <section className="max-w-7xl mx-auto">

                        <div className="grid grid-cols-1 lg:grid-cols-12 gap-6">

                            <div className="lg:col-span-3 space-y-6 order-2 lg:order-1">

                                {lead_news.slice(0, 2).map((news) => (
                                    <CategoryNewsLayout1 key={news.title} news={news}/>
                                ))}

                            </div>

                            <div className="lg:col-span-6 order-1 lg:order-2">

                                {lead_news.slice(2,3).map((news) => (
                                    <CategoryMainLeadNews key={news.title} news={news}/>
                                ))}

                            </div>

                            <div className="lg:col-span-3 space-y-6 order-3">
                                {lead_news.slice(3, 5).map((news) => (
                                    <CategoryNewsLayout1 key={news.title} news={news}/>
                                ))}
                            </div>

                        </div>
                    </section>

                    <section className="space-y-6">
                        {sub_lead_news.map((news) => (
                            <CategorySubLeadNews key={news.title} news={news}/>
                        ))}
                    </section>

                    <section className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                        {others_news.map((news) => (
                            <CategoryNewsLayout2 key={news.title} news={news}/>
                        ))}

                    </section>

                    <div className="flex justify-center pt-8">
                        <button className="px-6 py-2 text-sm bg-red-600 text-white rounded hover:bg-red-700">
                            Load more news
                        </button>
                    </div>

                </main>

                <aside className="lg:col-span-3 space-y-6">

                    <div className="bg-white p-5 rounded-lg shadow-sm">
                        <h3 className="text-lg font-semibold border-b pb-2 mb-4">
                            Trending
                        </h3>

                        <div className="space-y-4">
                            <p className="text-sm font-medium text-gray-800 hover:text-red-600 cursor-pointer">
                                Government reviews fuel pricing mechanism
                            </p>
                            <p className="text-sm font-medium text-gray-800 hover:text-red-600 cursor-pointer">
                                IMF negotiations enter critical phase
                            </p>
                            <p className="text-sm font-medium text-gray-800 hover:text-red-600 cursor-pointer">
                                Remittance inflow sees monthly rise
                            </p>
                        </div>
                    </div>

                </aside>

            </div>
        </div>

    );
};


const CategoryMainLeadNews = ({news} : {news: NewsListType}) => {
    return (
        <Link href={urlGenerator(news.url)} className="overflow-hidden block border-x border-slate-200 p-2 group h-full">
            <Image
                src={news.image}
                alt={news.title}
                height={600}
                width={1000}
            />
            <div className="p-2">

                <h2 className="text-xl line-clamp-2 md:text-2xl font-bold text-gray-900 mt-2 leading-tight">
                    {news.title}
                </h2>

                <div className="text-gray-600 line-clamp-2 mt-2">
                    <HtmlContent content={news.sort_description}/>
                </div>

                <div className="text-sm text-gray-500 mt-2">
                    {formatBanglaDate(news.date)}
                </div>
            </div>
        </Link>
    )
}


const CategorySubLeadNews = ({news} : {news: NewsListType}) => {
    return (
        <Link href={urlGenerator(news.url)} className="flex gap-2  p-2 border-b border-slate-200 group">
            <Image
                src={news.image}
                alt={news.title}
                height={150}
                width={250}
                className={'object-cover'}
            />
            <div>
                <h3 className="text-lg font-semibold text-gray-900 group-hover:text-red-600 leading-snug">
                    {news.title}
                </h3>
                <p className="text-gray-600 text-sm mt-1 line-clamp-2">
                    <HtmlContent content={news.sort_description}/>
                </p>
                <div className="text-xs text-gray-500 mt-2">
                    {formatBanglaDate(news.date)}
                </div>
            </div>
        </Link>
    )
}


const CategoryNewsLayout1 = ({news} : {news: NewsListType}) => {
    return (
        <Link href={urlGenerator(news.url)} className="overflow-hidden block border-b border-slate-200 py-2 group">
            <Image
                src={news.image}
                alt={news.title}
                height={300}
                width={500}
            />
            <div className="py-2">
                <h3 className="text-sm font-semibold text-gray-900 group-hover:text-red-600">
                    {news.title}
                </h3>
            </div>
        </Link>
    )
}

const CategoryNewsLayout2 = ({news} : {news: NewsListType}) => {
    return (

        <Link href={urlGenerator(news.url)} className="border-x block border-slate-200 p-2 overflow-hidden group">
            <Image
                src={news.image}
                alt={news.title}
                height={300}
                width={500}
            />
            <div className="p-4">
                <h3 className="font-semibold text-gray-900 group-hover:text-red-600">
                    {news.title}
                </h3>
                <div className="text-xs text-gray-500 mt-2">
                    {formatBanglaDate(news.date)}
                </div>
            </div>
        </Link>
    )
}


export default CategoryPage;