"use strict";
$(function() {
        const e = $(".select2"),
            t = $(".selectpicker");
        t.length && t.selectpicker(),
            e.length &&
            e.each(function() {
                var e = $(this);
                e.wrap('<div class="position-relative"></div>'),
                    e.select2({
                        placeholder: "Select value",
                        dropdownParent: e.parent(),
                    });
            });
    }),
    (function() {
        const e = document.querySelector(".wizard-numbered"),
            t = [].slice.call(e.querySelectorAll(".btn-next")),
            l = [].slice.call(e.querySelectorAll(".btn-prev")),
            d = e.querySelector(".btn-submit");
        if ((e, null !== e)) {
            const i = new Stepper(e, { linear: !1 });
            t &&
                t.forEach((e) => {
                    e.addEventListener("click", (e) => {
                        i.next();
                    });
                }),
                l &&
                l.forEach((e) => {
                    e.addEventListener("click", (e) => {
                        i.previous();
                    });
                }),
                d &&
                d.addEventListener("click", (e) => {
                    alert("Submitted..!!");
                });
        }
        const c = document.querySelector(".wizard-vertical"),
            u = [].slice.call(c.querySelectorAll(".btn-next")),
            v = [].slice.call(c.querySelectorAll(".btn-prev")),
            S = c.querySelector(".btn-submit");
        if ((c, null !== c)) {
            const a = new Stepper(c, { linear: !1 });
            u &&
                u.forEach((e) => {
                    e.addEventListener("click", (e) => {
                        a.next();
                    });
                }),
                v &&
                v.forEach((e) => {
                    e.addEventListener("click", (e) => {
                        a.previous();
                    });
                }),
                S &&
                S.addEventListener("click", (e) => {
                    alert("Submitted..!!");
                });
        }
        const r = document.querySelector(".wizard-modern-example"),
            p = [].slice.call(r.querySelectorAll(".btn-next")),
            b = [].slice.call(r.querySelectorAll(".btn-prev")),
            E = r.querySelector(".btn-submit");
        if ((r, null !== r)) {
            const o = new Stepper(r, { linear: !1 });
            p &&
                p.forEach((e) => {
                    e.addEventListener("click", (e) => {
                        o.next();
                    });
                }),
                b &&
                b.forEach((e) => {
                    e.addEventListener("click", (e) => {
                        o.previous();
                    });
                }),
                E &&
                E.addEventListener("click", (e) => {
                    alert("Submitted..!!");
                });
        }
        const n = document.querySelector(".wizard-modern-vertical"),
            m = [].slice.call(n.querySelectorAll(".btn-next")),
            q = [].slice.call(n.querySelectorAll(".btn-prev")),
            y = n.querySelector(".btn-submit");
        if ((n, null !== n)) {
            const s = new Stepper(n, { linear: !1 });
            m &&
                m.forEach((e) => {
                    e.addEventListener("click", (e) => {
                        s.next();
                    });
                }),
                q &&
                q.forEach((e) => {
                    e.addEventListener("click", (e) => {
                        s.previous();
                    });
                }),
                y &&
                y.addEventListener("click", (e) => {
                    alert("Submitted..!!");
                });
        }
    })();