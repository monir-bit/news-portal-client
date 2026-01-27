import type { Metadata } from "next";
import { Noto_Serif_Bengali } from "next/font/google";
import "./globals.css";

const notoSerifBengali = Noto_Serif_Bengali({
  variable: "--font-noto-serif-bengali",
  subsets: ["bengali"],
  weight: ["400", "700"],
  display: "swap",
});

export const metadata: Metadata = {
  title: "News Portal",
  description: "Bangla News Portal",
};

export default function RootLayout({
                                     children,
                                   }: {
  children: React.ReactNode;
}) {
  return (
      <html lang="bn">
      <body className={notoSerifBengali.className}>
      <div className="max-w-[1280px] mx-auto px-4">
        {children}
      </div>
      </body>
      </html>
  );
}
