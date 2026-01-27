import {CategorySummaryType} from "@/types/category-summary-type";

export type NewsListType = {
    slug: string;
    url: string;
    title: string;
    ticker: string;
    shoulder: string;
    sort_description: string;
    live_news: boolean;
    is_visible_shoulder: boolean;
    is_visible_ticker: boolean;
    date: string; // ISO string
    category: CategorySummaryType;
};
