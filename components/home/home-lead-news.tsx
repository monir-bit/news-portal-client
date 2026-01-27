import React from 'react';
import Image from "next/image";
import { IoTimeOutline } from "react-icons/io5";

const HomeLeadNews = () => {
    return (
        <div className='grid grid-cols-1 md:grid-cols-12 gap-6 mb-8'>
            <div className='col-span-12 md:col-span-6 flex flex-col gap-4 group cursor-pointer'>
                <div className=" transition-all duration-300">
                    <Image
                        width={600}
                        height={400}
                        className="w-full h-auto object-cover transition-transform duration-500"
                        priority
                        src='https://media.prothomalo.com/prothomalo-bangla%2F2026-01-27%2F14fpk92f%2FGayshwar.jpg'
                        alt={''}/>
                </div>

                <h1 className=' line-clamp-2 text-2xl md:text-2xl font-bold text-slate-800 dark:text-slate-100 group-hover:text-red-600 transition-colors leading-snug'>পাঁচ শীর্ষ ব্যবসায়ীর সঙ্গে মার্কিন রাষ্ট্রদূতের বৈঠক / দ্বিপাক্ষিক সহযোগিতা বাড়ানোর বিষয়ে আশাবাদি মেঘনা গ্রুপের চেয়ারম্যান মোস্তফা কামাল</h1>
                <p className='line-clamp-3 text-slate-600 dark:text-slate-400 leading-relaxed text-base'>ঢাকায় নবনিযুক্ত যুক্তরাষ্ট্রের রাষ্ট্রদূত ব্রেন্ট টি. ক্রিস্টেনসেন আজ সোমবার প্রথমবারের মতো চট্টগ্রাম বন্দর পরিদর্শন করেছেন। এ সময় তিনি দেশের শীর্ষ পাঁচ শিল্পোদ্যোক্তার সঙ্গে একান্ত বৈঠক করেছেন। বৈঠকে তাদের মধ্যে নির্বাচন-পরবর্তী বাংলাদেশের ব্যবসায়িক পরিবেশ, অবকাঠামো উন্নয়ন এবং দুই দেশের মধ্যকার বাণিজ্য ঘাটতি কমিয়ে আনার বিষয়ে বিস্তারিত আলোচনা হয়েছে।</p>
                <p className='text-sm text-slate-500 dark:text-slate-400 flex items-center gap-1'>
                    <IoTimeOutline className="text-base" />
                    <span>৩ ঘন্টা আগে</span>
                </p>
            </div>
            <div className='col-span-12 md:col-span-3'>
                <div className="flex flex-col gap-4">
                    {Array.from({ length: 3 }).map((_, index) => (
                        <div
                            key={index}
                            className='group cursor-pointer pb-4 border-b border-slate-200 dark:border-slate-700 last:border-b-0 hover:bg-slate-50 dark:hover:bg-slate-800/30 transition-all duration-300 p-3'
                        >
                            <h3 className="text-base font-bold line-clamp-2 leading-snug text-slate-800 dark:text-slate-200 group-hover:text-red-600 transition-colors mb-3">
                                ডাকছু নিয়ে জামায়াত নেতার কুরুচিপূর্ণ মন্তব্য ছাত্রদল ও জাতীয়তাবাদী ছাত্রদল {index + 1}
                            </h3>

                            <div className="flex gap-3">
                                <div className="flex-1">
                                    <p className='line-clamp-2 text-sm text-slate-600 dark:text-slate-400 leading-relaxed'>
                                        ঢাকায় নবনিযুক্ত যুক্তরাষ্ট্রের রাষ্ট্রদূত ব্রেন্ট টি. ক্রিস্টেনসেন আজ সোমবার প্রথমবারের মতো চট্টগ্রাম বন্দর পরিদর্শন করেছেন।
                                    </p>
                                    <p className='text-xs text-slate-500 dark:text-slate-400 mt-2 flex items-center gap-1'>
                                        <IoTimeOutline className="text-sm" />
                                        <span>৩ ঘন্টা আগে</span>
                                    </p>
                                </div>

                                <div className="relative overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 shrink-0">
                                    <div className="relative w-24 h-24">
                                        <Image
                                            fill
                                            sizes="96px"
                                            src={'https://media.prothomalo.com/prothomalo-bangla%2F2021-02%2Fe5d87b19-2be1-4a4a-93d6-1e899138e3e9%2F138848379_2804052016588789_3964770564387806983_n.jpg'}
                                            alt={`News ${index + 1}`}
                                            className="object-cover group-hover:scale-110 transition-transform duration-300"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
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