import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

// function getRouteComponent(path_file) {
//     return "./components/backend/" + path_file + "Component.vue";
// }
function setComponent(path_file) {
    const route_path = "./components/backend/pages/" + path_file + "Component.vue";
    return import ("" + route_path);
}

const routes = [
    { path: "*", component: () => setComponent("error/404") },
    {
        path: "/",
        redirect: { path: '/home' }
    },
    { path: "/home", component: () => setComponent("dashboard/Home"), name: "Home" },
    {
        path: "/users",
        component: () => setComponent("management/user/User"),
        name: "users",
    },
    {
        path: "/create/user",
        component: () => setComponent("management/user/UserForm"),
        name: "Create User",
    },
    {
        path: "/edit/user/:id",
        component: () => setComponent("management/user/UserForm"),
        name: "update-user",
    },
    { path: "/roles", component: () => setComponent("management/role/Role"), name: "Roles" },
    { path: "/create/roles", component: () => setComponent("management/role/CreateRole"), name: "CreateRoles" },
    { path: "/edit/roles/:id", component: () => setComponent("management/role/CreateRole"), name: "EditRoles" },
    { path: "/permissions", component: () => setComponent("management/permission/Permission"), name: "permissions", },
    { path: "/send/notify", component: () => setComponent("content/notification/SendNotify"), name: "SendNotify", },
    { path: "/show/notify", component: () => setComponent("content/notification/ShowNotification"), name: "ShowNotify", },
    { path: "/view/notify/:id", component: () => setComponent("content/notification/DetailNotification"), name: "ViewNotify", },
    {
        path: "/detail/notify:id",
        component: () => setComponent("content/notification/DetailNotification"),
        name: "detail-notify",
    },
    { path: "/customer/applications", component: () => setComponent("content/application/Applications"), name: "Customer Applications", },
    {
        path: "/edit/application/:id",
        component: () => setComponent("content/application/EditApplication"),
        name: "update-application",
    },
    {
        path: "/show/application/:id",
        component: () => setComponent("content/application/ShowApplication"),
        name: "show-application",
    },
    {
        path: "/my/application",
        component: () => setComponent("content/application/MyApplication"),
        name: "my-application",
    },
    {
        path: "/create/app",
        component: () => setComponent("content/application/CreateApp"),
        name: "create-application",
    },
    {
        path: "/profile/setting",
        component: () => setComponent("setting/ProfileSetting"),
        name: "profile-setting",
    },
    {
        path: "/password/setting",
        component: () => setComponent("setting/Password"),
        name: "password-setting",
    },
    {
        path: "/app/agent/file/:file",
        name: "download-file",
    },
    {
        path: "/assign/apps/:id/:role/:user",
        component: () => setComponent("content/application/AssignApp"),
        name: "assign-apps",
    },
    {
        path: "/assigned/apps/",
        component: () => setComponent("content/application/AssignedApp"),
        name: "assigned-apps",
    },
    {
        path: "/edit/assigned/:id",
        component: () => setComponent("content/application/AssignApp"),
        name: "EditAssignedApp"
    },
    {
        path: "/logs/activities",
        component: () => setComponent("setting/Log"),
        name: "LogActivities"
    },
    {
        path: "/agents/app",
        component: () => setComponent("content/application/AgentApplication"),
        name: "agent.apps"
    },
    {
        path: "/upload/files/:id",
        component: () => setComponent("content/application/UploadFile"),
        name: "upload-file"
    },


];

const router = new VueRouter({
    routes,
    linkActiveClass: "active",
    linkExactActiveClass: "exact-active" // short for `
});



router.beforeResolve((to, from, next) => {
    //
    next();
});

router.afterEach((to, from) => {
    // setTimeout(function() { $('.page-loader-wrapper').fadeOut(); }, 50);
});
export default router;
