import { fetchWithCache } from '@/lib/fetcher';
import { cacheKey } from '@/utils/cache-key';

export function getSiteInfo() {
    return fetchWithCache(
        cacheKey.siteInfo,
        '/site-info',
        3600
    );
}
