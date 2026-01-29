import { fetchWithCache } from '@/lib/fetcher';
import { cacheKey } from '@/utils/cache-key';
import {NewsDetailsResponseType} from "@/types/news-details-type";
import {NewsByCategoryType} from "@/types/news-by-category-type";


export function getNewsDetails(slug: string) {
    return fetchWithCache<NewsDetailsResponseType>(
        cacheKey.newsBySlug(slug),
        `/news-details/${slug}`,
        300
    );
}

export function getNewsByCategory(slug: string) {
    return fetchWithCache<NewsByCategoryType>(
        cacheKey.newsByCategory(slug),
        `/news-by-category/`+slug,
        180
    );
}
