'use client';
import React from 'react';
import {CategoryType} from "@/types/common-type";
type CategoryProps = {
    category: CategoryType[];
}

const Category = ({category}: CategoryProps) => {

    const [categories, setCategories] = React.useState<CategoryType[]>(category ?? []);

    return (
        <ul className='flex gap-1 justify-start lg:justify-center items-center whitespace-nowrap'>
            {categories.map((category: CategoryType) => (
                <li key={category.slug} className='px-4 py-3 text-lg font-medium hover:text-red-600 hover:bg-slate-50 dark:hover:bg-slate-800 rounded-lg transition-all cursor-pointer text-slate-700 dark:text-slate-300'>
                    {category.name}
                </li>
            ))}
        </ul>
    );
};

export default Category;