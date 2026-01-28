import Header from "@/components/shared/header";
import CategoryMenuBarServer from "@/components/shared/category-menu-bar.server";
import HomeVideoNews from "@/components/home/home-video-news";
import HomeLeadNews from "@/components/home/home-lead-news";
import HomePinNews from "@/components/home/home-pin-news";
import HomeSecondLeadNews from "@/components/home/home-second-lead-news";
import Footer from "@/components/shared/footer";
import {getHomeInitialNews} from "@/services/home.service";
import {HomeInitialNewsType} from "@/types/home-initial-news-type";

export default async function Home() {

    const data: HomeInitialNewsType = await getHomeInitialNews();

  return (
    <div className='min-h-screen bg-white dark:bg-slate-950'>


        <div className='grid gap-4'>
            <Header/>
            <CategoryMenuBarServer/>
            <HomeVideoNews newsData={data.trending_video_news} />
            <HomeLeadNews newsData={data.lead_news}/>
            <HomePinNews newsData={data.pin_news}/>
            <HomeSecondLeadNews newsData={data.sub_lead_news}/>
            <Footer/>
        </div>
    </div>
  );
}
