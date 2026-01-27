export type CategoryType = {
    name: string;
    slug: string;
    children: CategoryType[];
}

export type SiteInfoType = {
    name: string;
    description: string;
}

export type CommonType = {
    site_info: SiteInfoType;
    categories: CategoryType[];
}
