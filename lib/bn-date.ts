import { format } from 'date-fns';
import { bn } from 'date-fns/locale';

const BN_DIGITS = ['০','১','২','৩','৪','৫','৬','৭','৮','৯'];

export function toBanglaNumber(text: string): string {
    return text.replace(/\d/g, d => BN_DIGITS[Number(d)]);
}


export function formatBanglaDate(
    date: string | Date,
    pattern = 'dd MMMM yyyy'
): string {
    const formatted = format(new Date(date), pattern, {
        locale: bn,
    });

    // convert 0-9 to বাংলা সংখ্যা
    return toBanglaNumber(formatted);
}

export function banglaTimeAgo(date: string | Date): string {
    const now = new Date().getTime();
    const past = new Date(date).getTime();

    const diffInSeconds = Math.floor((now - past) / 1000);

    if (diffInSeconds < 60) {
        return toBanglaNumber(`${diffInSeconds} সেকেন্ড আগে`);
    }

    const diffInMinutes = Math.floor(diffInSeconds / 60);
    if (diffInMinutes < 60) {
        return toBanglaNumber(`${diffInMinutes} মিনিট আগে`);
    }

    const diffInHours = Math.floor(diffInMinutes / 60);
    if (diffInHours < 24) {
        return toBanglaNumber(`${diffInHours} ঘণ্টা আগে`);
    }

    const diffInDays = Math.floor(diffInHours / 24);
    return toBanglaNumber(`${diffInDays} দিন আগে`);
}
