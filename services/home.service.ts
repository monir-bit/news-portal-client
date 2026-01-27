import { fetchWithCache } from '@/lib/fetcher';
import { cacheKey } from '@/utils/cache-key';
import {HomeInitialNewsType} from "@/types/home-initial-news-type";

export function getHomeInitialNews() {
    return fetchWithCache<HomeInitialNewsType>(
        cacheKey.common,
        '/home',
        600
    );
}
