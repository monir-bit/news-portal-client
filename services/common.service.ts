import { fetchWithCache } from '@/lib/fetcher';
import { cacheKey } from '@/utils/cache-key';
import {CommonType} from "@/types/common-type";

export function getCommons() {
    return fetchWithCache<CommonType>(
        cacheKey.common,
        '/common',
        600
    );
}
