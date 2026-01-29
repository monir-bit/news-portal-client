import {CategorySummaryType} from "@/types/category-summary-type";
import {NewsListType} from "@/types/news-list-type";

export type DetailsType = {
    description: string;
    keyword: string | null;
    video_link: string | null;
    google_drive_link: string | null;
    audio_link: string | null;
}

export type NewsDetailsType = {
    slug: string;
    url: string;
    title: string;
    ticker: string;
    image: string;
    shoulder: string;
    sort_description: string;
    live_news: boolean;
    is_visible_shoulder: boolean;
    is_visible_ticker: boolean;
    date: string; // ISO string
    category: CategorySummaryType;
    details: DetailsType;
    tags: string[];
};

export type NewsDetailsResponseType = {
    news_details: NewsDetailsType;
    related_news: NewsListType[],
    most_read_news: NewsListType[],

}