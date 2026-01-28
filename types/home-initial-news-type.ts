import {SectionLayoutPositionedNewsType} from "@/types/section-layout-positioned-news-type";

export type HomeInitialNewsType = {
    trending_video_news: SectionLayoutPositionedNewsType[];
    lead_news: SectionLayoutPositionedNewsType[];
    pin_news: SectionLayoutPositionedNewsType[];
    sub_lead_news: SectionLayoutPositionedNewsType[];
}