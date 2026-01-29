import {NewsListType} from "@/types/news-list-type";

export type NewsByCategoryType = {
    category: {
        name: string;
        slug: string;
    }
    news_list: {
        lead_news: NewsListType[],
        sub_lead_news: NewsListType[],
        others_news: NewsListType[]
    };
}