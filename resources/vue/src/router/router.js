import Home from "../pages/Home";
import About from "../pages/About";
import Portfolio from "../pages/Portfolio";
import PortfolioCategory from "../pages/PortfolioCategory";
import Contact from "../pages/Contact";
import Blog from "../pages/Blog";

const routes = [
    {
        path: "/vue",
        name: "home",
        component: Home,
    },
    {
        path: "/vue/about",
        name: "about",
        component: About,
    },
    {
        path: "/vue/portfolio",
        name: "portfolio",
        component: Portfolio,
    },
    {
        path: "/vue/portfolio/:categoryId",
        name: "portfolioCategory",
        component: PortfolioCategory,
    },
    {
        path: "/vue/contact",
        name: "contact",
        component: Contact,
    },
    {
        path: "/vue/blog",
        name: "blog",
        component: Blog,
    },
];

export default routes;
