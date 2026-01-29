import {getNewsDetails} from "@/services/news.service";
import {NewsDetailsType} from "@/types/news-details-type";
import Image from "next/image";
import Link from "next/link";
import {formatBanglaDate} from "@/lib/bn-date";
import HtmlContent from "@/components/shared/html-content";
import React from "react";

interface PageProps {
    params: Promise<{
        slug: string[];
    }>;
}

export default async function NewsDetails({ params }: PageProps) {
    const { slug } = await params;
    const newsSlug = slug[slug.length - 1];
    const newsDetails: NewsDetailsType = await getNewsDetails(newsSlug)

    return (
        <div className='grid gap-4'>

            <div className="bg-gray-50 min-h-screen">
                <div className="max-w-7xl mx-auto px-4 py-8 grid grid-cols-1 lg:grid-cols-12 gap-8">

                    <article className="lg:col-span-8 bg-white p-6 rounded-lg shadow-sm">

                        <nav className="text-lg text-gray-500 mb-4">
                            <Link  href="#" className="text-blue-600 underline">{newsDetails.category.name}</Link>
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
                            <HtmlContent content={newsDetails.details.sort_description}/>
                        </div>

                        <div className="mt-8 flex flex-wrap gap-2">
                            {newsDetails.tags.map((tag) => (
                                <span key={tag} className="px-3 py-1 text-sm bg-gray-100 rounded-full">{tag}</span>
                            ))}
                        </div>

                    </article>

                    <aside className="lg:col-span-4 space-y-6">

                        <div className="bg-white p-5 rounded-lg shadow-sm">
                            <h3 className="text-lg font-semibold mb-4 border-b pb-2">
                                Related News
                            </h3>

                            <div className="space-y-4">
                                <a href="#" className="flex gap-3 group">
                                    <img
                                        src="https://via.placeholder.com/100x70"
                                        className="w-24 h-16 object-cover rounded"
                                    />
                                    <div>
                                        <p className="text-sm font-medium text-gray-800 group-hover:text-blue-600">
                                            Export earnings show signs of recovery
                                        </p>
                                        <span className="text-xs text-gray-500">Jan 26, 2026</span>
                                    </div>
                                </a>

                                <a href="#" className="flex gap-3 group">
                                    <img
                                        src="https://via.placeholder.com/100x70"
                                        className="w-24 h-16 object-cover rounded"
                                    />
                                    <div>
                                        <p className="text-sm font-medium text-gray-800 group-hover:text-blue-600">
                                            Energy sector reforms gain momentum
                                        </p>
                                        <span className="text-xs text-gray-500">Jan 25, 2026</span>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </aside>

                </div>
            </div>

        </div>
    );
}