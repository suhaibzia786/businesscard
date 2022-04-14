"use strict";
$(function() {
    var t = $("html").hasClass("light-style") ? "default" : "default-dark",
        e = $("#jstree-basic"),
        s = $("#jstree-custom-icons"),
        x = $("#jstree-context-menu"),
        n = $("#jstree-drag-drop"),
        c = $("#jstree-checkbox"),
        l = $("#jstree-ajax");
    e.length && e.jstree({ core: { themes: { name: t } } }),
        s.length &&
        s.jstree({
            core: {
                themes: { name: t },
                data: [{
                        text: "css",
                        children: [
                            { text: "app.css", type: "css" },
                            { text: "style.css", type: "css" },
                        ],
                    },
                    {
                        text: "img",
                        state: { opened: !0 },
                        children: [
                            { text: "bg.jpg", type: "img" },
                            { text: "logo.png", type: "img" },
                            { text: "avatar.png", type: "img" },
                        ],
                    },
                    {
                        text: "js",
                        state: { opened: !0 },
                        children: [
                            { text: "jquery.js", type: "js" },
                            { text: "app.js", type: "js" },
                        ],
                    },
                    { text: "index.html", type: "html" },
                    { text: "page-one.html", type: "html" },
                    { text: "page-two.html", type: "html" },
                ],
            },
            plugins: ["types"],
            types: {
                default: { icon: "bx bx-folder" },
                html: { icon: "bx bxl-html5 text-danger" },
                css: { icon: "bx bxl-css3 text-info" },
                img: { icon: "bx bx-image text-success" },
                js: { icon: "bx bxl-nodejs text-warning" },
            },
        }),
        x.length &&
        x.jstree({
            core: {
                themes: { name: t },
                check_callback: !0,
                data: [{
                        text: "css",
                        children: [
                            { text: "app.css", type: "css" },
                            { text: "style.css", type: "css" },
                        ],
                    },
                    {
                        text: "img",
                        state: { opened: !0 },
                        children: [
                            { text: "bg.jpg", type: "img" },
                            { text: "logo.png", type: "img" },
                            { text: "avatar.png", type: "img" },
                        ],
                    },
                    {
                        text: "js",
                        state: { opened: !0 },
                        children: [
                            { text: "jquery.js", type: "js" },
                            { text: "app.js", type: "js" },
                        ],
                    },
                    { text: "index.html", type: "html" },
                    { text: "page-one.html", type: "html" },
                    { text: "page-two.html", type: "html" },
                ],
            },
            plugins: ["types", "contextmenu"],
            types: {
                default: { icon: "bx bx-folder" },
                html: { icon: "bx bxl-html5 text-danger" },
                css: { icon: "bx bxl-css3 text-info" },
                img: { icon: "bx bx-image text-success" },
                js: { icon: "bx bxl-nodejs text-warning" },
            },
        }),
        n.length &&
        n.jstree({
            core: {
                themes: { name: t },
                check_callback: !0,
                data: [{
                        text: "css",
                        children: [
                            { text: "app.css", type: "css" },
                            { text: "style.css", type: "css" },
                        ],
                    },
                    {
                        text: "img",
                        state: { opened: !0 },
                        children: [
                            { text: "bg.jpg", type: "img" },
                            { text: "logo.png", type: "img" },
                            { text: "avatar.png", type: "img" },
                        ],
                    },
                    {
                        text: "js",
                        state: { opened: !0 },
                        children: [
                            { text: "jquery.js", type: "js" },
                            { text: "app.js", type: "js" },
                        ],
                    },
                    { text: "index.html", type: "html" },
                    { text: "page-one.html", type: "html" },
                    { text: "page-two.html", type: "html" },
                ],
            },
            plugins: ["types", "dnd"],
            types: {
                default: { icon: "bx bx-folder" },
                html: { icon: "bx bxl-html5 text-danger" },
                css: { icon: "bx bxl-css3 text-info" },
                img: { icon: "bx bx-image text-success" },
                js: { icon: "bx bxl-nodejs text-warning" },
            },
        }),
        c.length &&
        c.jstree({
            core: {
                themes: { name: t },
                data: [{
                        text: "css",
                        children: [
                            { text: "app.css", type: "css" },
                            { text: "style.css", type: "css" },
                        ],
                    },
                    {
                        text: "img",
                        state: { opened: !0 },
                        children: [
                            { text: "bg.jpg", type: "img" },
                            { text: "logo.png", type: "img" },
                            { text: "avatar.png", type: "img" },
                        ],
                    },
                    {
                        text: "js",
                        state: { opened: !0 },
                        children: [
                            { text: "jquery.js", type: "js" },
                            { text: "app.js", type: "js" },
                        ],
                    },
                    { text: "index.html", type: "html" },
                    { text: "page-one.html", type: "html" },
                    { text: "page-two.html", type: "html" },
                ],
            },
            plugins: ["types", "checkbox", "wholerow"],
            types: {
                default: { icon: "bx bx-folder" },
                html: { icon: "bx bxl-html5 text-danger" },
                css: { icon: "bx bxl-css3 text-info" },
                img: { icon: "bx bx-image text-success" },
                js: { icon: "bx bxl-nodejs text-warning" },
            },
        }),
        l.length &&
        l.jstree({
            core: {
                themes: { name: t },
                data: {
                    url: assetsPath + "json/jstree-data.json",
                    dataType: "json",
                    data: function(t) {
                        return { id: t.id };
                    },
                },
            },
            plugins: ["types", "state"],
            types: {
                default: { icon: "bx bx-folder" },
                html: { icon: "bx bxl-html5 text-danger" },
                css: { icon: "bx bxl-css3 text-info" },
                img: { icon: "bx bx-image text-success" },
                js: { icon: "bx bxl-nodejs text-warning" },
            },
        });
});