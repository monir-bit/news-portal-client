import type { Metadata } from "next";
import { Noto_Serif_Bengali } from "next/font/google";
import "./globals.css";
import Header from "@/components/shared/header";
import CategoryMenuBarServer from "@/components/shared/category-menu-bar.server";
import Footer from "@/components/shared/footer";
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

export default function RootLayout({children}: { children: React.ReactNode; }) {
  return (
      <html lang="bn">
      <body className={notoSerifBengali.className}>
      <div className="max-w-[1280px] mx-auto px-4">
          <div className='min-h-screen bg-white dark:bg-slate-950'>
              <Header/>
              <CategoryMenuBarServer/>
              <div className='my-3'>
                  {children}
              </div>
              <Footer/>
          </div>
      </div>
      </body>
      </html>
  );
}
