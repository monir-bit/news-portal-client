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
