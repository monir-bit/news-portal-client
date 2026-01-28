import type { NextConfig } from "next";

const nextConfig: NextConfig = {
  /* config options here */
    images: {

        remotePatterns: [
            {
                protocol: 'http',
                hostname: 'news-portal-admin.test',
                port: '',
                pathname: '/storage/uploads/**',
            },
            {
                protocol: 'https',
                hostname: '**',
                port: '',
                pathname: '**',
            },


        ],
    },
};

export default nextConfig;
