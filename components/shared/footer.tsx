import React from 'react';
import { FaFacebookF, FaYoutube, FaTwitter, FaInstagram } from 'react-icons/fa';
import { IoMdArrowDropright } from 'react-icons/io';
import logo from '@/assets/images/logo.png';
import Image from "next/image";
const Footer = () => {
    return (
        <footer className="bg-slate-50 p-3">
            <div className=' py-12'>
                <div className='grid grid-cols-1 md:grid-cols-3 justify-between gap-8'>
                    {/* Left Column - Contact Info */}
                    <div className='text-slate-700 dark:text-slate-300'>
                        <h3 className='text-xl font-bold mb-4 text-slate-800 dark:text-slate-100'>সম্পাদকীয় কার্যালয় :</h3>
                        <div className='space-y-2 text-sm leading-relaxed'>
                            <p>ইউনিট (ডি-৬) সেন্টার (৭ম তলা), ৯৩ কাজী নজরুল</p>
                            <p>ইসলাম এভিনিউ, কারওয়ান বাজার, ঢাকা- ১২১৫</p>
                            <p className='mt-3'><strong>সম্পাদকীয়:</strong> ০১৭২৫ ২৬১৬২৮</p>
                            <p><strong>বিজ্ঞাপন:</strong> ০১৭৫৫ ৩৫১১৬৪</p>
                            <p><strong>ইমেইল:</strong> agamirsomoy@mail.com</p>
                        </div>
                    </div>

                    {/* Center Column - Logo & Editor */}
                    <div className='text-center'>
                        <div>
                            <Image src={logo} alt='আগামীর সময়' className='mx-auto mb-4 w-40 h-auto' />
                        </div>
                        <div className='text-slate-700 dark:text-slate-300 space-y-2'>
                            <p className='font-semibold'>প্রধান সম্পাদক ও প্রকাশক: <span className='font-bold'>আবদুস সাত্তার মিয়াঝী</span></p>
                            <p className='font-semibold'>সম্পাদক: <span className='font-bold'>মোঃঞ্জা মামুন</span></p>
                        </div>

                        {/* Social Media Icons */}
                        <div className='flex justify-center gap-3 mt-6'>
                            <a href='#' className='w-10 h-10 bg-blue-600 hover:bg-red-700 text-white rounded-full flex items-center justify-center transition-colors duration-300'>
                                <FaFacebookF />
                            </a>
                            <a href='#' className='w-10 h-10 bg-red-600 hover:bg-red-700 text-white rounded-full flex items-center justify-center transition-colors duration-300'>
                                <FaYoutube />
                            </a>
                            <a href='#' className='w-10 h-10 bg-sky-500 hover:bg-sky-600 text-white rounded-full flex items-center justify-center transition-colors duration-300'>
                                <FaTwitter />
                            </a>
                            <a href='#' className='w-10 h-10 bg-pink-600 hover:bg-pink-700 text-white rounded-full flex items-center justify-center transition-colors duration-300'>
                                <FaInstagram />
                            </a>
                        </div>
                    </div>

                    {/* Right Column - Important Links */}
                    <div className='text-slate-700 text-end dark:text-slate-300'>
                        <h3 className='text-xl font-bold mb-4 text-slate-800 dark:text-slate-100'>গুরুত্বপূর্ণ লিংক</h3>
                        <ul className='space-y-2 flex flex-col items-end'>
                            <li className='flex items-center justify-end gap-2 hover:text-red-600 dark:hover:text-red-400 transition-colors cursor-pointer'>
                                <span>তথ্য ও সংস্থার মন্ত্রণালয়</span>
                                <IoMdArrowDropright className='text-xl' />
                            </li>
                            <li className='flex items-center justify-end gap-2 hover:text-red-600 dark:hover:text-red-400 transition-colors cursor-pointer'>
                                <span>ফায়ার সার্ভিস</span>
                                <IoMdArrowDropright className='text-xl' />
                            </li>
                            <li className='flex items-center justify-end gap-2 hover:text-red-600 dark:hover:text-red-400 transition-colors cursor-pointer'>
                                <span>র্যাব</span>
                                <IoMdArrowDropright className='text-xl' />
                            </li>
                            <li className='flex items-center justify-end gap-2 hover:text-red-600 dark:hover:text-red-400 transition-colors cursor-pointer'>
                                <span>জরুরি হটলাইন</span>
                                <IoMdArrowDropright className='text-xl' />
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </footer>
    );
};

export default Footer;