'use client';

import { usePathname } from 'next/navigation';
import { useEffect, useState } from 'react';
import PageLoader from '@/components/shared/page-loader';

export default function RouteLoader() {
    const pathname = usePathname();
    const [loading, setLoading] = useState(false);

    useEffect(() => {
        // eslint-disable-next-line react-hooks/set-state-in-effect
        setLoading(true);
        const t = setTimeout(() => setLoading(false), 1000);
        return () => clearTimeout(t);
    }, [pathname]);

    if (!loading) return null;

    return (
        <div className="fixed inset-0 z-50 bg-white/70 flex items-center justify-center">
            <PageLoader />
        </div>
    );
}
