import React from 'react';
import {FaBars} from "react-icons/fa6";
import {getCommons} from "@/services/common.service";
import {CommonType} from "@/types/common-type";
import Category from "@/components/shared/category";
const  CategoryMenuBarServer = async () => {
    const data: CommonType  = await getCommons();
    return (
        <nav className='sticky top-0 z-40 bg-white -mt-4 dark:bg-slate-950'>
            <div className='flex border-b border-slate-200 dark:border-slate-700 justify-between items-center'>
                <button className='flex items-center justify-center w-10 h-10 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors text-slate-700 dark:text-slate-300 lg:hidden'>
                    <FaBars className='text-lg' />
                </button>

                <div className='flex-1 overflow-x-auto'>
                    <Category category={data.categories}/>
                </div>
            </div>
        </nav>
    );
};

export default CategoryMenuBarServer;