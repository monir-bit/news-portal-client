import redis from './redis';
import { apiGet } from './api-client';

const REDIS_ENABLED = process.env.REDIS_ENABLED === 'true';

export async function fetchWithCache<T>(
    key: string,
    apiUrl: string,
    ttl = 60
): Promise<T> {

    // ❌ Redis disabled
    if (!REDIS_ENABLED) {
        return apiGet<T>(apiUrl);
    }

    // (future redis logic here)
    try {
        const cached = await redis.get(key);
        if (cached) return JSON.parse(cached);
    } catch {}

    const data = await apiGet<T>(apiUrl);

    try {
        await redis.set(key, JSON.stringify(data), 'EX', ttl);
    } catch {}

    return data;
}
