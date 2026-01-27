export const cacheKey = {
    common: 'common:data',


    siteInfo: 'site:info',
    categories: 'categories:list',
    leadNews: 'news:lead',
    breakingNews: 'news:breaking',
    newsBySlug: (slug: string) => `news:${slug}`,
    newsByCategory: (slug: string) => `news:category:${slug}`,
};
