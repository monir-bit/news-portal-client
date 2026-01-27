import { fetchWithCache } from '@/lib/fetcher';
import { cacheKey } from '@/utils/cache-key';
import { News } from '@/types/news';

export function getLeadNews() {
    return fetchWithCache<News[]>(
        cacheKey.leadNews,
        '/news/lead',
        120
    );
}

export function getBreakingNews() {
    return fetchWithCache<News[]>(
        cacheKey.breakingNews,
        '/news/breaking',
        30
    );
}

export function getNewsDetails(slug: string) {
    return fetchWithCache<News>(
        cacheKey.newsBySlug(slug),
        `/news/${slug}`,
        300
    );
}

export function getNewsByCategory(slug: string) {
    return fetchWithCache<News[]>(
        cacheKey.newsByCategory(slug),
        `/categories/${slug}/news`,
        180
    );
}
