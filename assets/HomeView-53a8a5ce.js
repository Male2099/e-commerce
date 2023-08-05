import{p as d}from"./productApi-67af33a0.js";import{_ as v,r as u,o,c,a as e,F as h,b as p,d as n,w as _,t as l,e as a,n as w,f as g}from"./index-a6d04a70.js";import{l as k}from"./loading-0d1663cc.js";const j={data(){return{speciaListProducts:[],discounts:[]}},async mounted(){this.speciaListProducts=await d.special(),this.discounts=await d.discount()},methods:{}},C={key:0,class:"w-full flex justify-center px-4"},$={class:"w-[var(--fixed-width)] max-w-[100vw] flex flex-col items-center gap-4"},O=e("div",{class:"w-[100vw]"},[e("div",{class:"flex justify-center text-[2.4rem] max-sm:text-[1.5rem] font-bold orange-backgroundColor"},"EXPLORE THE COLLECTION")],-1),V={class:"flex gap-4 justify-center w-full overflow-auto"},E={class:"w-full flex gap-1"},L={class:"w-full flex gap-1"},T={class:"h-[11.5rem] w-[11rem] flex flex-col items-center shadow-md broder-[1px] rounded relative overflow-hidden"},F={class:"w-full h-[8.6rem] overflow-hidden"},H=["src"],N={class:"font-bold py-[.65rem]"},P={class:"absolute right-[-37%] top-[5%] w-full orange-backgroundColor rotate-[45deg] flex justify-center"},U={class:"font-bold"},B={key:0,class:"absolute left-0 top-0 rounded purple_background_color text-white"},I={class:"font-bold"},K={class:"w-full flex flex-col gap-4"},z={class:"w-full flex flex-col gap-4"},D={class:"w-[50%] max-sm:w-full p-4 flex flex-col items-center"},R={class:"font-bold"},S={class:"text-[1.8rem] font-bold"},W={class:""},X={class:"mt-auto mb-7"},q={key:0,class:"mr-4 px-4 py-1 font-bold text-white nav-background-linear-gradient rounded-2xl"},A=["src"];function G(i,f,m,b,s,y){const r=u("router-link");return s.discounts[0]?(o(),c("div",C,[e("div",$,[O,e("section",V,[e("div",E,[e("ul",L,[(o(!0),c(h,null,p(s.speciaListProducts,t=>(o(),c("li",{key:t.id},[n(r,{to:{name:"product",params:{id:t.id}}},{default:_(()=>[e("div",T,[e("div",F,[e("img",{src:t.imageUrl,class:"w-full object-contain",alt:""},null,8,H)]),e("div",N,l(t.name),1),e("span",P,[e("div",U,l(t.price),1)]),t.discount>0?(o(),c("span",B,[e("div",I,l(t.discount)+"%",1)])):a("",!0)])]),_:2},1032,["to"])]))),128))])])]),e("section",K,[e("ul",z,[(o(!0),c(h,null,p(s.discounts,(t,x)=>(o(),c("li",{key:t.id,class:w(["min-h-fit w-full gap-4 flex max-sm:flex-col-reverse rounded shadow-md overflow-hidden",{"flex-row-reverse":x%2==0}])},[e("div",D,[e("div",R,l(t.special_desc),1),e("div",S,l(t.name),1),e("p",W,l(t.title),1),e("div",X,[t.discount>0?(o(),c("button",q,l(t.discount)+"OFF ",1)):a("",!0),n(r,{to:{name:"product",params:{id:t.id}},class:"px-4 py-1 font-bold text-black border-[2px] border-black rounded-2xl hover:text-[var(--menu-active-color)]"},{default:_(()=>[g(" CHECK IT OUT ")]),_:2},1032,["to"])])]),e("div",{class:w(["w-[50%] max-sm:w-full flex max-sm:justify-center",{"justify-end":x%2==0}])},[e("img",{src:t.imageUrl,class:"h-full max-h-[40vh] object-contain overflow-hidden",alt:""},null,8,A)],2)],2))),128))])])])])):a("",!0)}const J=v(j,[["render",G]]),M={components:{loadingVue:k},data(){return{product:{}}},async mounted(){const[i]=await d.welcomeOffer();this.product=i}},Q={key:0,class:"w-full flex min-h-fit justify-center"},Y={class:"relative w-[var(--fixed-wdith)] h-fit"},Z={class:"flex max-lg:flex-col-reverse max-lg:items-center overflow-hidden"},ee={class:"p-4 w-[50%] max-sm:w-full flex flex-col gap-[1.4rem] items-center justify-center"},te={class:"text-[2.4rem]"},se={class:"w-[75%] text-base"},oe={class:"flex gap-[6rem] max-sm:gap-4"},ce={key:0,class:"px-4 py-1 font-bold text-white nav-background-linear-gradient rounded-2xl"},le={class:"w-[50%] max-sm:w-full flex max-sm:justify-center"},ne=["src"],ie={key:1,class:"w-full min-h-[85vh] flex justify-center"};function re(i,f,m,b,s,y){const r=u("router-link"),t=u("loadingVue");return s.product.id?(o(),c("div",Q,[e("ul",Y,[e("li",Z,[e("div",ee,[e("strong",te,l(s.product.name),1),e("p",se,l(s.product.title),1),e("div",oe,[s.product.discount>0?(o(),c("button",ce,l(s.product.discount)+"% OFF ",1)):a("",!0),n(r,{to:{name:"product",params:{id:s.product.id-0}},class:"px-4 py-1 font-bold text-black border-[2px] border-black rounded-2xl hover:text-[var(--menu-active-color)]"},{default:_(()=>[g(" CHECK IT OUT ")]),_:1},8,["to"])])]),e("div",le,[e("img",{src:s.product.imageUrl,class:"h-full max-h-[50vh] object-contain",alt:""},null,8,ne)])])])])):(o(),c("div",ie,[n(t)]))}const ae=v(M,[["render",re]]),fe={__name:"HomeView",setup(i){return(f,m)=>(o(),c("div",null,[n(ae),n(J)]))}};export{fe as default};
