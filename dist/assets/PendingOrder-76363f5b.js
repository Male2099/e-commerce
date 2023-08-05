import{_ as r}from"./resourceicon-b85101f1.js";import{_ as c,o as l,c as d,a as e,t as m,h as x,T as f,i as u,e as i,j as _,g as a,f as b}from"./index-6513cb84.js";const v={data(){return{quantity:1,open_CancelOrderModal:!1}},methods:{disableScroll_OnOpenModal(){document.body.classList.add("modal-open")},enableScroll_OnCloseModal(){document.body.classList.remove("modal-open")}},watch:{open_CancelOrderModal(n){this.open_CancelOrderModal?this.disableScroll_OnOpenModal():this.enableScroll_OnCloseModal()}}},p={class:"w-full flex justify-center py-4 max-sm:p-0 min-h-[85vh]"},h={class:"w-[var(--fixed-width)] max-w-[100vw] h-fit p-4 max-sm:p-2 flex max-sm:flex-col max-sm:gap-4 gap-8"},w={class:"w-[45%] max-sm:w-full flex flex-col"},g=e("div",{class:"w-full mb-2 flex justify-between border-b font-bold text-[1.25rem]"},[e("div",null,"Pendign order"),e("div",null,"6 orders")],-1),y={class:"flex flex-col gap-4"},k={class:"border-b"},j=e("div",{class:"w-full mb-2 font-bold text-[1.25rem]"},[e("div",{class:"font-bold text-[1.1rem] text-gray-500"},"Date: 10-12-2023 11AM")],-1),C={class:"w-full gap-4 flex font-bold text-[1rem] justify-between"},O=e("div",{class:"w-full gap-4 flex"},[e("div",{class:"h-full flex items-center"},[e("img",{class:"h-[3rem]",src:r,alt:""})]),e("div",{class:"text-[var(--purple-background)]"},[e("div",null,"Item 3"),e("div",null,"Total: 5.99$"),e("div",null,"Promocode: none")])],-1),M={class:"flex flex-col justify-between"},D=e("button",{class:"px-2 py-1 rounded text-white bg-[var(--purple-background)]"},"Detail",-1),S={class:"min-h-[100vh] max-sm:h-fit max-sm:min-h-fit w-[55%] max-sm:w-full pl-4 max-sm:pl-0 bg-[#F4F4F4]"},P=i('<div class="w-full mb-2 border-b font-bold text-[1.25rem]"><div>item 1</div></div><div class="w-ful flex"><div class="w-[40%] font-bold max-sm:font-semibold text-[1.1rem] max-sm:text-[1rem] text-gray-500 pl-4"> Product</div><div class="w-[20%] font-bold max-sm:font-semibold text-[1.1rem] max-sm:text-[1rem] text-gray-500 flex justify-center"> Quantity</div><div class="w-[20%] font-bold max-sm:font-semibold text-[1.1rem] max-sm:text-[1rem] text-gray-500 flex justify-center"> Price</div><div class="w-[20%] font-bold max-sm:font-semibold text-[1.1rem] max-sm:text-[1rem] text-gray-500 flex justify-center"> Total</div></div>',2),T={class:"w-full flex flex-col gap-3 max-sm:gap-1"},V={class:"w-full h-[5.6rem] flex border-b"},$=i('<div class="w-[40%] flex items-center font-bold text-[1.1rem] gap-1 text-gray-500"><div class="h-[70%] overflow-hidden"><img class="h-full max-sm:w-[3.5rem] max-sm:h-fit object-contain" src="'+b+'" alt=""></div><div class="h-[100%] flex flex-col justify-around"><div class="text-[1.35rem] max-sm:text-[1rem] font-bold max-sm:font-semibold text-black"> Donut123</div><div class="text-[.9rem] max-sm:text-[.75rem] font-semibold text-[var(--purple-background)]"> Doiscount 10%</div></div></div>',1),B={class:"w-[20%] font-bold text-[1.1rem] text-black flex justify-center"},N={class:"flex gap-1 max-sm:gap-0 items-center h-full"},F={class:"w-[3rem] max-sm:w-6 h-[3rem] max-sm:h-6 max-sm:font-semibold max-sm:text-[.9rem] flex justify-center items-center rounded"},q=e("div",{class:"w-[20%] font-bold max-sm:font-semibold max-sm:text-[.9rem] text-[1.1rem] flex justify-center items-center text-black"},[e("div",null,"0.99$")],-1),A=e("div",{class:"w-[20%] font-bold text-[1.1rem] max-sm:font-semibold max-sm:text-[.9rem] flex justify-center items-center text-black"},[e("div",null,"12.99$")],-1),L={key:0},z={class:"fixed w-[100vw] min-h-[100vh] flex justify-center items-center top-0 left-0 z-20 background-opacity-70percent-black"},E={class:"w-[350px] h-fit p-4 pb-8 flex flex-col gap-4 items-center bg-white rounded"},I=e("div",null,[e("img",{class:"w-[5rem] filter-black",src:_,alt:""})],-1),Q=e("div",{class:"text-[2rem] text-gray-800 font-semibold"}," Are your sure? ",-1),R=e("div",null,[e("p",{class:"text-center text-gray-500"},[a(" Do you really want to remove this order? "),e("br"),a(" you will need provide reason ")])],-1),G={class:"flex w-full justify-around mt-4"};function H(n,t,J,K,s,U){return l(),d("div",p,[e("div",h,[e("section",w,[g,e("ul",y,[e("li",k,[j,e("div",C,[O,e("div",M,[D,e("button",{onClick:t[0]||(t[0]=o=>s.open_CancelOrderModal=!0),class:"w-[7rem] text-[var(--blood-red-background)]"},"Cancel order")])])])])]),e("section",S,[P,e("ul",null,[e("li",T,[e("div",V,[$,e("div",B,[e("div",N,[e("div",F,m(s.quantity),1)])]),q,A])])])])]),s.open_CancelOrderModal?(l(),d("div",L,[(l(),x(f,{to:"body"},[e("div",z,[e("div",E,[I,Q,R,e("div",G,[e("button",{onClick:t[1]||(t[1]=o=>s.open_CancelOrderModal=!1),class:"rounded font-semibold px-4 py-1 text-white border bg-[var(--green-background)]"},"Cancel"),e("button",{onClick:t[2]||(t[2]=o=>s.open_CancelOrderModal=!1),class:"rounded font-semibold px-4 py-1 text-white border bg-[var(--blood-red-background)]"},"Remove")])])])]))])):u("",!0)])}const Y=c(v,[["render",H]]);export{Y as default};