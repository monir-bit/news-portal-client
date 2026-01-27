import React from 'react';
import Image from "next/image";

const HomePinNews = () => {
    return (
        <div className="grid grid-cols-4 gap-2">
            {Array.from({ length: 4 }).map((_, index) => (
                <div
                    key={index}
                    className="group cursor-pointer flex border p-2 border-slate-100 bg-white dark:bg-slate-800/50 transition-all duration-300"
                >
                    <div className="relative overflow-hidden transition-all duration-300 flex-shrink-0">
                        <div className="relative w-16 h-16">
                            <Image
                                fill
                                sizes="128px"
                                src={'https://media.prothomalo.com/prothomalo-bangla%2F2021-02%2Fe5d87b19-2be1-4a4a-93d6-1e899138e3e9%2F138848379_2804052016588789_3964770564387806983_n.jpg'}
                                alt={`Video news ${index + 1}`}
                                className="object-cover rounded-full group-hover:scale-105 transition-transform duration-300"
                            />

                        </div>
                    </div>

                    <div className="flex-1 flex items-center">
                        <h3 className="text-sm text-center line-clamp-2 font-medium leading-relaxed text-slate-700 dark:text-slate-300 group-hover:text-red-600 transition-colors">
                            ডাকছু নিয়ে জামায়াত নেতার কুরুচিপূর্ণ মন্তব্য ছাত্রদল ও জাতীয়তাবাদী ছাত্রদল {index + 1}
                        </h3>
                    </div>
                </div>
            ))}
        </div>
    );
};

export default HomePinNews;