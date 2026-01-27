import {NewsListType} from "@/types/news-list-type";

export type LayoutPositionWiseNews = {
    position: number;
    news: NewsListType;
};

export type HomeInitialNewsType = {
    "trending-video-news": LayoutPositionWiseNews[];
    "lead-news": LayoutPositionWiseNews[];
    "pin-news": LayoutPositionWiseNews[];
    "sub-lead-news": LayoutPositionWiseNews[];
}