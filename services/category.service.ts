import { fetchWithCache } from '@/lib/fetcher';
import { cacheKey } from '@/utils/cache-key';
import { Category } from '@/types/category';

export function getCategories() {
    return fetchWithCache<Category[]>(
        cacheKey.categories,
        '/categories',
        600
    );
}
