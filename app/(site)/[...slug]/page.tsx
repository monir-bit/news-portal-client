import {getNewsDetails} from "@/services/news.service";
import {NewsDetailsResponseType, NewsDetailsType} from "@/types/news-details-type";
import Image from "next/image";
import Link from "next/link";
import {formatBanglaDate} from "@/lib/bn-date";
import HtmlContent from "@/components/shared/html-content";
import React from "react";
import {NewsListType} from "@/types/news-list-type";
import ShowTime from "@/components/shared/show-time";
import {urlGenerator} from "@/lib/utils";
import { Tabs } from "radix-ui";

interface PageProps {
    params: Promise<{
        slug: string[];
    }>;
}

export default async function NewsDetails({ params }: PageProps) {
    const { slug } = await params;
    const newsSlug = slug[slug.length - 1];
    const newsDetailsResponse: NewsDetailsResponseType = await getNewsDetails(newsSlug)
    const newsDetails: NewsDetailsType = newsDetailsResponse.news_details;
    const relatedNews: NewsListType[] = newsDetailsResponse.related_news;
    const most_read_news: NewsListType[] = newsDetailsResponse.most_read_news;

    return (
        <div className='grid gap-4'>

            <div className="bg-gray-50 min-h-screen">
                <div className="max-w-7xl mx-auto px-4 py-8 grid grid-cols-1 lg:grid-cols-12 gap-8">

                    <article className="lg:col-span-8 bg-white p-6 rounded-lg shadow-sm">

                        <nav className="text-lg text-gray-500 mb-4">
                            <Link  href="#" className="text-red-600 underline">{newsDetails.category.name}</Link>
                        </nav>

                        <h1 className="text-3xl md:text-4xl font-bold text-gray-900 leading-tight mb-4">
                            {newsDetails.title}
                        </h1>

                        <div className="flex flex-wrap items-center text-sm text-gray-500 mb-6 gap-4">
                            <span>🗓 {formatBanglaDate(newsDetails.date)}</span>
                            <span>✍️ নিজস্ব প্রতিবেদক</span>
                            {/*<span>👁 12,450 views</span>*/}
                        </div>

                        <div className="relative w-full h-64 md:h-96 mb-6 overflow-hidden rounded-lg">
                            <Image
                                height={600}
                                width={1080}
                                className='object-cover' src={newsDetails.image}
                                alt={newsDetails.title}
                            />
                        </div>

                        <div className="prose prose-lg max-w-none text-gray-800">
                            <HtmlContent content={newsDetails.sort_description}/>
                        </div>

                        <div className="prose prose-lg max-w-none text-gray-800">
                            <HtmlContent content={newsDetails.details.description}/>
                        </div>

                        <div className="mt-8 flex flex-wrap gap-2">
                            {newsDetails.tags.map((tag) => (
                                <span key={tag} className="px-3 py-1 text-sm bg-gray-100 rounded-full">{tag}</span>
                            ))}
                        </div>

                    </article>

                    <aside className="lg:col-span-4 space-y-6">

                        <TabsDemo mostRead={most_read_news} relatedNews={relatedNews} />

                    </aside>

                </div>
            </div>

        </div>
    );
}



const TabsDemo = ({mostRead, relatedNews} : {mostRead: NewsListType[], relatedNews: NewsListType[]}) => (
    <Tabs.Root
        className="flex flex-col "
        defaultValue="tab2"
    >
        <Tabs.List
            className="flex shrink-0 border-b border-gray-200"
            aria-label="Manage your account"
        >
            <Tabs.Trigger
                className="flex h-[45px] flex-1 cursor-pointer select-none items-center justify-center bg-white px-5 text-[15px] font-medium leading-none text-red-600 outline-none hover:bg-red-50 data-[state=active]:bg-red-600 data-[state=active]:text-white data-[state=active]:border-b-2 data-[state=active]:border-red-600"
                value="tab1"
            >
                এ সম্পর্কিত নিউজ
            </Tabs.Trigger>
            <Tabs.Trigger
                className="flex h-[45px] flex-1 cursor-pointer select-none items-center justify-center bg-white px-5 text-[15px] font-medium leading-none text-red-600 outline-none hover:bg-red-50 data-[state=active]:bg-red-600 data-[state=active]:text-white data-[state=active]:border-b-2 data-[state=active]:border-red-600"
                value="tab2"
            >
                সর্বাধিক পঠিত
            </Tabs.Trigger>
        </Tabs.List>
        <Tabs.Content
            className="grow rounded-b-md bg-white outline-none border border-t-0 border-gray-200"
            value="tab1"
        >
            <div className="divide-y divide-gray-200">
                {relatedNews.map((news) => (
                    <Link key={news.title} href={urlGenerator(news.url)} className="flex gap-3 p-3 group hover:bg-gray-50 transition-colors">
                        <Image
                            height={150}
                            width={250}
                            src={news.image}
                            alt={news.title}
                            className="w-24 h-16 object-cover rounded group-hover:scale-105 transition-transform duration-300"
                        />
                        <div>
                            <p className="text-sm font-medium text-gray-800 group-hover:text-red-600">
                                {news.title}
                            </p>
                            <ShowTime time={formatBanglaDate(news.date)}/>
                        </div>
                    </Link>
                ))}
            </div>
        </Tabs.Content>
        <Tabs.Content
            className="grow rounded-b-md bg-white outline-none border border-t-0 border-gray-200"
            value="tab2"
        >
            <div className="divide-y divide-gray-200">
                {mostRead.map((news) => (
                    <Link key={news.title} href={urlGenerator(news.url)} className="flex gap-3 p-3 group hover:bg-gray-50 transition-colors">
                        <Image
                            height={150}
                            width={250}
                            src={news.image}
                            alt={news.title}
                            className="w-24 h-16 object-cover rounded group-hover:scale-105 transition-transform duration-300"
                        />
                        <div>
                            <p className="text-sm font-medium text-gray-800 group-hover:text-red-600">
                                {news.title}
                            </p>
                            <ShowTime time={formatBanglaDate(news.date)}/>
                        </div>
                    </Link>
                ))}
            </div>
        </Tabs.Content>
    </Tabs.Root>
);
