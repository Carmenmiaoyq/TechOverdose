<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-24 mx-auto">
                        <div class="text-center mb-20">
                            <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 mb-4">Raw Denim Heirloom Man Braid</h1>
                            <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-500s">Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo juice poutine, ramps microdosing banh mi pug.</p>
                            <div class="flex mt-6 justify-center">
                                <div class="w-16 h-1 rounded-full bg-indigo-500 inline-flex"></div>
                            </div>
                        </div>

                        <div class="flex justify-between my-3 block text-sm text-left text-white bg-indigo-600 h-12 items-center p-4 rounded-md relative " role="alert" >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="flex-shrink-0 order-first w-6 h-6 mx-2 stroke-current" >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" ></path>
                            </svg>
                            <span class="flex-1 font-bold">Hardware</span>

                            <button class="order-last bg-transparent text-2xl font-semibold leading-none outline-none focus:outline-none " >

                                <svg  class="hidden" id="arrow-up" onclick="document.getElementById('arrow-up').style.display='none';
                                               document.getElementById('arrow-down').style.display='inline'"xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                                </svg>

                                <svg id="arrow-down" onclick="document.getElementById('arrow-down').style.display='none';
                                               document.getElementById('arrow-up').style.display='inline'"

                                    xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>

                            </button>
                        </div>

                        {{-- <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4 md:space-y-0 space-y-6"> --}}

                        {{--     <div class="p-4 mb-4 md:w-1/3 flex flex-col text-center items-center"> --}}
                        {{--         <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5 flex-shrink-0"> --}}
                        {{--             <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24"> --}}
                        {{--                 <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path> --}}
                        {{--             </svg> --}}
                        {{--         </div> --}}

                        {{--         <div class="flex-grow"> --}}
                        {{--             <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Shooting Stars</h2> --}}
                        {{--             {{-1- <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo juice poutine, ramps microdosing banh mi pug VHS try-hard.</p> -1-}} --}}
                        {{--             <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More --}}
                        {{--                 <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24"> --}}
                        {{--                     <path d="M5 12h14M12 5l7 7-7 7"></path> --}}
                        {{--                 </svg> --}}
                        {{--             </a> --}}
                        {{--         </div> --}}
                        {{--     </div> --}}

                        {{--     <div class="p-4 mb-4 md:w-1/3 flex flex-col text-center items-center"> --}}
                        {{--         <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5 flex-shrink-0"> --}}
                        {{--             <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24"> --}}
                        {{--                 <circle cx="6" cy="6" r="3"></circle> --}}
                        {{--                 <circle cx="6" cy="18" r="3"></circle> --}}
                        {{--                 <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path> --}}
                        {{--             </svg> --}}
                        {{--         </div> --}}
                        {{--         <div class="flex-grow"> --}}
                        {{--             <h2 class="text-gray-900 text-lg title-font font-medium mb-3">The Catalyzer</h2> --}}
                        {{--             {{-1- <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo juice poutine, ramps microdosing banh mi pug VHS try-hard.</p> -1-}} --}}
                        {{--             <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More --}}
                        {{--                 <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24"> --}}
                        {{--                     <path d="M5 12h14M12 5l7 7-7 7"></path> --}}
                        {{--                 </svg> --}}
                        {{--             </a> --}}
                        {{--         </div> --}}
                        {{--     </div> --}}

                        {{--     <div class="p-4 mb-4 md:w-1/3 flex flex-col text-center items-center"> --}}
                        {{--         <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5 flex-shrink-0"> --}}
                        {{--             <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24"> --}}
                        {{--                 <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path> --}}
                        {{--                 <circle cx="12" cy="7" r="4"></circle> --}}
                        {{--             </svg> --}}
                        {{--         </div> --}}
                        {{--         <div class="flex-grow"> --}}
                        {{--             <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Neptune</h2> --}}
                        {{--             {{-1- <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo juice poutine, ramps microdosing banh mi pug VHS try-hard.</p> -1-}} --}}
                        {{--             <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More --}}
                        {{--                 <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24"> --}}
                        {{--                     <path d="M5 12h14M12 5l7 7-7 7"></path> --}}
                        {{--                 </svg> --}}
                        {{--             </a> --}}
                        {{--         </div> --}}
                        {{--     </div> --}}

                        {{--     <div class="p-4 mb-4 md:w-1/3 flex flex-col text-center items-center"> --}}
                        {{--         <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5 flex-shrink-0"> --}}
                        {{--             <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24"> --}}
                        {{--                 <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path> --}}
                        {{--                 <circle cx="12" cy="7" r="4"></circle> --}}
                        {{--             </svg> --}}
                        {{--         </div> --}}
                        {{--         <div class="flex-grow"> --}}
                        {{--             <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Neptune</h2> --}}
                        {{--             <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo juice poutine, ramps microdosing banh mi pug VHS try-hard.</p> --}}
                        {{--             <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More --}}
                        {{--                 <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24"> --}}
                        {{--                     <path d="M5 12h14M12 5l7 7-7 7"></path> --}}
                        {{--                 </svg> --}}
                        {{--             </a> --}}
                        {{--         </div> --}}
                        {{--     </div> --}}
                        {{-- </div> --}}

                        {{-- <button class="flex mx-auto mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Button</button> --}}

                    </div>
                </section>

                {{-- <x-jet-welcome /> --}}
            </div>
        </div>
    </div>

</x-app-layout>
