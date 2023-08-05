import { createRouter, createWebHistory } from "vue-router";
import ClientApp from "../views/ClientApp.vue";
import auth from "../libs/apis/auth";

const protectedRoute = {
  meta: { requiresAuth: true },
};

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "CilentApp",
      component: ClientApp,
      children: [
        {
          path: "",
          name: "home",
          component: () => import("../views/ClientView/HomeView.vue"),
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
          path: "/me",
          name: "me",
          ...protectedRoute,
          children: [
            {
              path: "cart",
              name: "cart",

              component: () => import("../views/ClientView/CartView.vue"),
            },
            {
              path: "pending",
              name: "pending",
              component: () =>
                import("../components/client/authenticted/PendingOrder.vue"),
            },
            {
              path: "profile",
              name: "profile",

              component: () =>
                import("../components/client/authenticted/Profile.vue"),
            },
            {
              path: "history",
              name: "history",

              component: () =>
                import("../components/client/authenticted/History.vue"),
            },
          ],
        },
      ],
    },
    {
      path: "/admin",
      name: "admin",
      ...protectedRoute,
      component: () => import("../views/AdminApp.vue"),
      children: [
        {
          path: "",
          name: "admin/dashboard",
          component: () => import("../views/adminView/DashboardView.vue"),
        },
        {
          path: "category",
          name: "admin/category",
          component: () => import("../views/adminView/CategoryView.vue"),
        },
        {
          path: "product",
          name: "admin/product",
          component: () => import("../views/adminView/ProductView.vue"),
        },

        {
          path: "order",
          name: "admin/order",
          component: () => import("../views/adminView/OrderView.vue"),
        },
        {
          path: "customer",
          name: "admin/customer",
          component: () => import("../views/adminView/CustomerView.vue"),
        },
        {
          path: "setting",
          name: "admin/setting",
          component: () => import("../views/adminView/SettingView.vue"),
        },
      ],
    },
    {
      path: "/:catchAll(.*)",
      // component not fount
    },
  ],
});

router.beforeEach(async (to, from, next) => {
  const me = await auth.getMe();
  if (
    me?.status === 200 &&
    !to.matched.some((record) => record.path.startsWith("/admin")) &&
    me?.data.role === "role_admin"
  ) {
    next({ name: "admin" });
  } else if (to.matched.some((record) => record.meta.requiresAuth)) {
    if (to.name.startsWith("admin/") && me?.data.role !== "role_admin") {
      next({ name: "home" });
    } else if (me?.status === 200) {
      next();
    } else {
      next({ name: "home" });
    }
  } else {
    next();
  }
});
export default router;
