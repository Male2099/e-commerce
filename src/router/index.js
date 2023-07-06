import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/ClientView/HomeView.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/rnd",
      name: "rnd",
      component: ()=>("../components/client/cart/Order_summarize.vue"),
    },
    {
      path: "/",
      name: "home",
      component: HomeView,
    },
    {
      path: "/:catchAll(.*)",
      // component not fount
    },
    {
      path: "/menu",
      name: "menu",
      component: () => import("../views/ClientView/MenuView.vue"),
    },
    {
      path: "/product/:id",
      name: "product",
      component: () => import("../components/Client/Product.vue"),
    },
    {
      path: "/about",
      name: "about",

      component: () => import("../views/ClientView/AboutUsView.vue"),
    },
    {
      path: "/contact",
      name: "contact",

      component: () => import("../views/ClientView/ContactView.vue"),
    },
    {
      path: "/cart",
      name: "cart",

      component: () => import("../views/ClientView/CartView.vue"),
      // children:{
      //   path:"/checkout-step1",
      //   name:"checkout-step1",
      //   component:()=> import('../components/Client/cart/Customer_Info.vue')
      // }
    },
  ],
});

export default router;
