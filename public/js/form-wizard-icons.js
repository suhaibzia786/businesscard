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
        const e = document.querySelector(".wizard-icons-example");
        if ((e, null !== e)) {
            const r = [].slice.call(e.querySelectorAll(".btn-next")),
                n = [].slice.call(e.querySelectorAll(".btn-prev")),
                i = e.querySelector(".btn-submit"),
                a = new Stepper(e, { linear: !1 });
            r &&
                r.forEach((e) => {
                    e.addEventListener("click", (e) => {
                        a.next();
                    });
                }),
                n &&
                n.forEach((e) => {
                    e.addEventListener("click", (e) => {
                        a.previous();
                    });
                }),
                i &&
                i.addEventListener("click", (e) => {
                    alert("Submitted..!!");
                });
        }
        const t = document.querySelector(".wizard-vertical-icons-example");
        if ((t, null !== t)) {
            const o = [].slice.call(t.querySelectorAll(".btn-next")),
                s = [].slice.call(t.querySelectorAll(".btn-prev")),
                d = t.querySelector(".btn-submit"),
                u = new Stepper(t, { linear: !1 });
            o &&
                o.forEach((e) => {
                    e.addEventListener("click", (e) => {
                        u.next();
                    });
                }),
                s &&
                s.forEach((e) => {
                    e.addEventListener("click", (e) => {
                        u.previous();
                    });
                }),
                d &&
                d.addEventListener("click", (e) => {
                    alert("Submitted..!!");
                });
        }
        const l = document.querySelector(".wizard-modern-icons-example");
        if ((l, null !== l)) {
            const p = [].slice.call(l.querySelectorAll(".btn-next")),
                v = [].slice.call(l.querySelectorAll(".btn-prev")),
                S = l.querySelector(".btn-submit"),
                b = new Stepper(l, { linear: !1 });
            p &&
                p.forEach((e) => {
                    e.addEventListener("click", (e) => {
                        b.next();
                    });
                }),
                v &&
                v.forEach((e) => {
                    e.addEventListener("click", (e) => {
                        b.previous();
                    });
                }),
                S &&
                S.addEventListener("click", (e) => {
                    alert("Submitted..!!");
                });
        }
        const c = document.querySelector(
            ".wizard-modern-vertical-icons-example"
        );
        if ((c, null !== c)) {
            const E = [].slice.call(c.querySelectorAll(".btn-next")),
                m = [].slice.call(c.querySelectorAll(".btn-prev")),
                q = c.querySelector(".btn-submit"),
                y = new Stepper(c, { linear: !1 });
            E &&
                E.forEach((e) => {
                    e.addEventListener("click", (e) => {
                        y.next();
                    });
                }),
                m &&
                m.forEach((e) => {
                    e.addEventListener("click", (e) => {
                        y.previous();
                    });
                }),
                q &&
                q.addEventListener("click", (e) => {
                    alert("Submitted..!!");
                });
        }
    })();