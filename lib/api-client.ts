const API_BASE = process.env.BACKEND_API_URL;

if (!API_BASE) {
    throw new Error("BACKEND_API_URL is not defined");
}

export async function apiGet<T>(url: string): Promise<T> {
    try {
        const res = await fetch(`${API_BASE}${url}`, {
            next: { revalidate: 180 },
            // cache: "no-store",
            headers: {
                Accept: "application/json",
            },
        });

        if (!res.ok) {
            const text = await res.text();
            throw new Error(`API ${res.status}: ${text}`);
        }

        return res.json();
    } catch (error) {
        console.error("API FETCH FAILED:", {
            url: `${API_BASE}${url}`,
            error,
        });

        throw error;
    }
}
