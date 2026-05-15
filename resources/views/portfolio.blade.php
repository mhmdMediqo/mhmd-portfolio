<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mohammad Aghajani | Full-Stack & Flutter Engineer</title>
    <meta name="description" content="Interactive 3D resume and portfolio for Mohammad Aghajani. Full-stack Laravel and Flutter engineering with production product delivery.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700;800&family=Outfit:wght@500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #04070d;
            --bg-soft: #0a1420;
            --panel: rgba(10, 16, 28, 0.66);
            --panel-strong: rgba(12, 20, 34, 0.86);
            --line: rgba(150, 203, 255, 0.24);
            --text: #eef6ff;
            --muted: #9fb4d1;
            --accent: #7af0d5;
            --accent-2: #6fb9ff;
            --accent-3: #ffb887;
            --max: 1240px;
            --section-pad: clamp(3.5rem, 8vw, 7rem);
        }
        * { box-sizing: border-box; }
        html, body { margin: 0; }
        html { scroll-behavior: smooth; }
        body {
            font-family: "Manrope", sans-serif;
            color: var(--text);
            background: radial-gradient(circle at 8% 18%, rgba(111, 185, 255, 0.2), transparent 30%), radial-gradient(circle at 84% 10%, rgba(122, 240, 213, 0.15), transparent 28%), linear-gradient(180deg, #020307 0%, #07101a 45%, #04060b 100%);
            overflow-x: clip;
        }
        body::before {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 0;
            background-image: linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
            background-size: 70px 70px;
            mask-image: radial-gradient(circle at center, black 24%, transparent 82%);
        }
        a { color: inherit; text-decoration: none; }
        .shell { position: relative; z-index: 1; }
        .section-inner { width: min(calc(100% - 2rem), var(--max)); margin: 0 auto; }
        section { padding: var(--section-pad) 0; content-visibility: auto; contain-intrinsic-size: 1px 950px; }
        .hero {
            min-height: 100vh;
            display: grid;
            align-items: center;
            padding: clamp(4rem, 8vh, 6rem) 0;
        }
        .hero-grid { display: grid; grid-template-columns: 1fr 1fr; gap: clamp(1.2rem, 3vw, 2.4rem); align-items: center; }
        .kicker {
            display: inline-flex;
            align-items: center;
            gap: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 0.18em;
            font-size: 0.74rem;
            color: var(--accent);
        }
        .kicker::before { content: ""; width: 2rem; height: 1px; background: linear-gradient(90deg, var(--accent), transparent); }
        h1, h2, h3 { font-family: "Outfit", sans-serif; }
        h1 {
            margin: 0.9rem 0;
            font-size: clamp(2.15rem, 5.6vw, 4.9rem);
            line-height: 0.98;
            letter-spacing: -0.03em;
        }
        .name-gradient { background: linear-gradient(120deg, #8df7dc 0%, #83ccff 45%, #ffc28f 100%); -webkit-background-clip: text; background-clip: text; color: transparent; }
        .hero p { margin: 0; color: var(--muted); line-height: 1.75; max-width: 62ch; }
        .cta-row { display: flex; flex-wrap: wrap; gap: 0.8rem; margin-top: 1.4rem; }
        .button {
            min-height: 48px;
            padding: 0 1.2rem;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            font-weight: 700;
            transition: transform 220ms ease, background 220ms ease, border-color 220ms ease;
            border: 1px solid transparent;
        }
        .button:hover, .button:focus-visible { transform: translateY(-2px); }
        .button-primary { background: linear-gradient(130deg, var(--accent), var(--accent-2)); color: #031019; box-shadow: 0 12px 32px rgba(122, 240, 213, 0.22); }
        .button-ghost { background: rgba(255,255,255,0.04); border-color: rgba(255,255,255,0.14); }

        .scene {
            perspective: 1200px;
            transform-style: preserve-3d;
            position: relative;
            min-height: 520px;
        }
        .floating-grid {
            position: relative;
            height: 100%;
            transform-style: preserve-3d;
        }
        .float-card {
            position: absolute;
            width: clamp(180px, 24vw, 320px);
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid var(--line);
            background: var(--panel);
            backdrop-filter: blur(14px);
            box-shadow: 0 22px 65px rgba(0,0,0,0.34);
            transform-style: preserve-3d;
            will-change: transform;
        }
        .float-card img { display: block; width: 100%; height: 100%; object-fit: cover; }
        .float-card .label {
            position: absolute;
            left: 0.8rem;
            bottom: 0.8rem;
            padding: 0.32rem 0.65rem;
            border-radius: 999px;
            background: rgba(3, 7, 13, 0.66);
            border: 1px solid rgba(255,255,255,0.18);
            font-size: 0.76rem;
            letter-spacing: 0.06em;
            text-transform: uppercase;
        }
        .float-1 { height: 210px; left: 0%; top: 7%; transform: translateZ(80px) rotateY(-12deg) rotateX(6deg); }
        .float-3 { height: 220px; left: 18%; bottom: 3%; transform: translateZ(42px) rotateY(8deg); }
        .float-4 { height: 260px; right: 18%; bottom: -3%; transform: translateZ(140px) rotateY(-7deg); }

        .glass-card {
            border: 1px solid var(--line);
            border-radius: 24px;
            background: linear-gradient(180deg, rgba(11, 18, 30, 0.88), rgba(7, 12, 22, 0.54));
            backdrop-filter: blur(18px);
        }

        .section-head { margin-bottom: 1.8rem; }
        .section-head h2 { margin: 0.85rem 0 0; font-size: clamp(1.75rem, 3.8vw, 3.1rem); line-height: 1.05; }
        .section-head p { margin: 0.7rem 0 0; color: var(--muted); max-width: 68ch; line-height: 1.7; }

        .experience-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 1rem;
            perspective: 900px;
        }
        .exp-card {
            padding: 1.15rem;
            transform-style: preserve-3d;
            transition: transform 300ms ease, border-color 300ms ease;
        }
        .exp-card:hover { border-color: rgba(122, 240, 213, 0.45); }
        .exp-meta { display: flex; flex-wrap: wrap; gap: 0.52rem; margin-bottom: 0.72rem; }
        .exp-meta span {
            font-size: 0.8rem;
            color: #d8e9ff;
            border: 1px solid rgba(255,255,255,0.13);
            background: rgba(255,255,255,0.04);
            border-radius: 999px;
            padding: 0.35rem 0.62rem;
        }
        .exp-card h3 { margin: 0 0 0.55rem; font-size: 1.08rem; }
        .exp-card p { margin: 0; color: var(--muted); line-height: 1.67; }
        .chips { margin-top: 0.78rem; display: flex; flex-wrap: wrap; gap: 0.52rem; }
        .chips span {
            font-size: 0.78rem;
            padding: 0.33rem 0.58rem;
            border-radius: 999px;
            border: 1px solid rgba(122, 240, 213, 0.28);
            color: #d8fff5;
            background: rgba(122, 240, 213, 0.1);
        }

        .showcase-grid { display: grid; grid-template-columns: 1.2fr 1fr 1fr; gap: 1rem; }
        .media-card {
            border-radius: 22px;
            overflow: hidden;
            position: relative;
            min-height: 220px;
            border: 1px solid var(--line);
            background: var(--panel-strong);
            transform-style: preserve-3d;
            transition: transform 280ms ease, border-color 280ms ease;
        }
        .media-card:hover { transform: translateY(-4px) translateZ(14px); border-color: rgba(122, 240, 213, 0.52); }
        .media-card img { width: 100%; height: 100%; display: block; object-fit: cover; }
        .media-copy {
            position: absolute;
            left: 0.9rem;
            right: 0.9rem;
            bottom: 0.8rem;
            padding: 0.72rem;
            border-radius: 12px;
            background: rgba(5, 10, 18, 0.72);
            border: 1px solid rgba(255,255,255,0.14);
        }
        .media-copy h3 { margin: 0; font-size: 1rem; }
        .media-copy p { margin: 0.4rem 0 0; font-size: 0.9rem; color: #bdd0e6; }
        .featured { grid-row: span 2; min-height: 460px; }

        .contact-panel { padding: 1.2rem; display: grid; gap: 0.8rem; }
        .contact-panel p { margin: 0; color: var(--muted); }

        .footer { padding: 1.2rem 0 2rem; }
        .footer .section-inner { border-top: 1px solid rgba(255,255,255,0.1); padding-top: 1rem; color: var(--muted); display: flex; justify-content: space-between; gap: 0.8rem; font-size: 0.9rem; }

        [data-reveal] {
            opacity: 0;
            transform: translate3d(0, 28px, 0) scale(0.99);
            transition: opacity 620ms cubic-bezier(0.22, 1, 0.36, 1), transform 620ms cubic-bezier(0.22, 1, 0.36, 1);
        }
        [data-reveal].is-visible { opacity: 1; transform: translate3d(0, 0, 0) scale(1); }
        [data-tilt] { will-change: transform; }

        @media (max-width: 1024px) {
            .hero-grid, .showcase-grid, .experience-grid { grid-template-columns: 1fr; }
            .scene { min-height: 430px; }
            .featured { min-height: 320px; grid-row: span 1; }
        }
        @media (max-width: 680px) {
            .float-card { width: clamp(150px, 40vw, 220px); }
            .float-4 { right: 8%; }
            h1 { font-size: clamp(1.85rem, 10vw, 2.8rem); }
            .footer .section-inner { flex-direction: column; }
        }
        @media (prefers-reduced-motion: reduce) {
            html { scroll-behavior: auto; }
            *, *::before, *::after { animation: none !important; transition: none !important; }
            [data-reveal] { opacity: 1 !important; transform: none !important; }
        }
    </style>
</head>
<body>
    <div class="shell">
        <main>
            <section class="hero">
                <div class="section-inner hero-grid">
                    <div data-reveal>
                        <span class="kicker">Resume / Portfolio</span>
                        <h1><span class="name-gradient">Mohammad Aghajani</span><br>Senior Full-Stack & Flutter Engineer</h1>
                        <p>I design and ship high-performance products across Laravel, Blade, Vite, and Flutter ecosystems, balancing architecture quality, rich UI motion, and maintainable delivery.</p>
                        <div class="cta-row">
                            <a class="button button-primary" href="https://www.linkedin.com/in/mohammad-aghajani-435830206" target="_blank" rel="noopener">LinkedIn</a>
                            <a class="button button-ghost" href="https://github.com/mhmdmediqo" target="_blank" rel="noopener">GitHub</a>
                            <a class="button button-ghost" href="#media-showcase">View Projects</a>
                        </div>
                    </div>
                    <div class="scene" data-reveal data-parallax>
                        <div class="floating-grid">
                            <article class="float-card float-1" data-tilt>
                                <picture>
                                    <img src="/media/placeholders/profile-shot.svg" alt="Profile visual placeholder" width="900" height="1100" fetchpriority="high" decoding="async">
                                </picture>
                                <span class="label">Profile</span>
                            </article>
                            <article class="float-card float-3" data-tilt>
                                <picture><img src="/media/placeholders/project-grid-01.svg" alt="Project screenshot placeholder" width="1400" height="900" loading="lazy" decoding="async"></picture>
                                <span class="label">Work Visual</span>
                            </article>
                            <article class="float-card float-4" data-tilt>
                                <picture><img src="/media/placeholders/project-grid-02.svg" alt="Media preview placeholder" width="1400" height="900" loading="lazy" decoding="async"></picture>
                                <span class="label">Showcase</span>
                            </article>
                        </div>
                    </div>
                </div>
            </section>

            <section id="experience">
                <div class="section-inner">
                    <div class="section-head" data-reveal>
                        <span class="kicker">Experience</span>
                        <h2>Production roles from newest to oldest.</h2>
                        <p>Searchha is positioned as the latest full-stack delivery, followed by engineering, leadership, and instructor roles across healthcare, B2B, logistics, consumer, and education products.</p>
                    </div>
                    <div class="experience-grid">
                        <article class="glass-card exp-card" data-reveal data-tilt><div class="exp-meta"><span>Searchha</span><span>3 months</span><span>Full-Stack</span><span>searchha.com</span></div><h3>Senior Full-Stack Developer / Full-Stack Developer</h3><p>Designed and developed the complete Searchha platform over 3 months with Laravel backend and Blade + Vite frontend, focused on architecture quality, responsive UI, performance, and maintainability.</p><div class="chips"><span>Laravel</span><span>Blade</span><span>Vite</span><span>Full-Stack Development</span></div></article>
                        <article class="glass-card exp-card" data-reveal data-tilt><div class="exp-meta"><span>TECHTIQ</span><span>Full-time</span><span>Dec 2024 - Present</span><span>Dubai, UAE · Remote</span></div><h3>Flutter Team Lead</h3><p>Led healthcare web application design and development with scalable architecture, mentoring, code reviews, reliability, and cross-functional collaboration with product, UI/UX, and QA teams.</p><div class="chips"><span>Flutter</span><span>Jira</span></div></article>
                        <article class="glass-card exp-card" data-reveal data-tilt><div class="exp-meta"><span>Jhogd</span><span>Freelance</span><span>Jun 2024 - Oct 2024</span><span>Netherlands · Remote</span></div><h3>Senior Flutter Developer</h3><p>Built a quiz application for Iranian users, focused on UX, API integration, testing, debugging, feedback analysis, and performance optimization.</p><div class="chips"><span>Flutter</span><span>Git</span></div></article>
                        <article class="glass-card exp-card" data-reveal data-tilt><div class="exp-meta"><span>Searchha</span><span>Freelance</span><span>Aug 2024</span><span>Tehran, Iran · Remote</span></div><h3>Senior Flutter Developer</h3><p>Designed and developed the Searchha B2B app for business connectivity with scalable architecture, API integration, usability testing, and performance monitoring.</p><div class="chips"><span>Flutter</span><span>API Integration</span><span>Performance Monitoring</span></div></article>
                        <article class="glass-card exp-card" data-reveal data-tilt><div class="exp-meta"><span>Gamiran / Isfaf</span><span>Freelance</span><span>Mar 2024 - Sep 2024</span><span>Tehran Province, Iran · Remote</span></div><h3>Senior Flutter Developer</h3><p>Developed a fitness tracking application focused on strong user experience, reliable performance, and health-oriented tracking features.</p><div class="chips"><span>Flutter</span></div></article>
                        <article class="glass-card exp-card" data-reveal data-tilt><div class="exp-meta"><span>Besenior</span><span>Full-time</span><span>Feb 2024 - Sep 2024</span><span>Iran · Remote</span></div><h3>Team Lead - Mobile Application Development</h3><p>Led Android and iOS development for LeagueTournament, emphasizing clean architecture, team coordination, and cross-platform delivery.</p><div class="chips"><span>Flutter</span><span>GitFlow</span></div></article>
                        <article class="glass-card exp-card" data-reveal data-tilt><div class="exp-meta"><span>Besenior</span><span>Full-time</span><span>Feb 2021 - Sep 2024</span></div><h3>Flutter Development Instructor</h3><p>Taught Flutter and mobile engineering concepts, mentoring students on architecture, state management, and practical product implementation.</p><div class="chips"><span>Flutter</span><span>Dart</span><span>Get It</span></div></article>
                        <article class="glass-card exp-card" data-reveal data-tilt><div class="exp-meta"><span>Self-employed</span><span>Jan 2019 - Feb 2023</span><span>Babol, Mazandaran, Iran</span></div><h3>Android Development Instructor</h3><p>Taught native Android development, architecture principles, Android Jetpack, and LiveData-driven app design.</p><div class="chips"><span>Android</span><span>Android Jetpack</span><span>LiveData</span></div></article>
                        <article class="glass-card exp-card" data-reveal data-tilt><div class="exp-meta"><span>Besenior</span><span>Full-time</span><span>Jun 2022 - Aug 2022</span><span>Tehran Province, Iran</span></div><h3>Flutter Developer</h3><p>Developed LeagueBS, a Flutter app for League of Legends learning with clean UI, architecture consistency, and strong UX.</p><div class="chips"><span>Flutter</span><span>Dart</span><span>Get It</span></div></article>
                        <article class="glass-card exp-card" data-reveal data-tilt><div class="exp-meta"><span>T Ah</span><span>Freelance</span><span>Aug 2022 - Jun 2023</span><span>Tehran Province, Iran · Remote</span></div><h3>Flutter Developer</h3><p>Built a transportation app to improve logistics workflows, team communication, route planning, and real-time tracking.</p><div class="chips"><span>Flutter</span><span>Clean Architecture</span></div></article>
                        <article class="glass-card exp-card" data-reveal data-tilt><div class="exp-meta"><span>Chitan Peitan</span><span>Contract</span><span>Sep 2022 - Dec 2022</span><span>Tehran Province, Iran · Remote</span></div><h3>Flutter Developer</h3><p>Delivered Android, iOS, and Web features with Get It, Bloc/Cubit, Dio, and Repository Pattern for maintainable cross-platform systems.</p><div class="chips"><span>Flutter</span><span>Git</span><span>Get It</span><span>Bloc/Cubit</span><span>Dio</span><span>Repository Pattern</span></div></article>
                        <article class="glass-card exp-card" data-reveal data-tilt><div class="exp-meta"><span>Mobin Khodro</span><span>Freelance</span><span>Apr 2022 - Jul 2022</span><span>Tehran Province, Iran</span></div><h3>Flutter Developer</h3><p>Built an automation application for internal workflows with a clean user experience and structured implementation approach.</p><div class="chips"><span>Flutter</span><span>Git</span></div></article>
                        <article class="glass-card exp-card" data-reveal data-tilt><div class="exp-meta"><span>Pte With Ash</span><span>Freelance</span><span>Jan 2020 - Jul 2021</span><span>Istanbul, Turkiye</span></div><h3>Android Developer</h3><p>Developed an English-learning Android app centered on lesson structure, interaction quality, and learning-focused user flows.</p><div class="chips"><span>Android</span><span>RxAndroid</span></div></article>
                    </div>
                </div>
            </section>

            <section id="media-showcase">
                <div class="section-inner">
                    <div class="section-head" data-reveal>
                        <span class="kicker">Projects / Media</span>
                        <h2>3D showcase with photos and project previews.</h2>
                        <p>The cards below are media-first and optimized for performance with lazy images and transform-only interaction animation.</p>
                    </div>
                    <div class="showcase-grid" data-reveal>
                        <article class="media-card featured" data-tilt>
                            <picture>
                                <img src="/media/placeholders/searchha-feature.svg" alt="Searchha featured project preview" width="1600" height="1000" decoding="async">
                            </picture>
                            <div class="media-copy">
                                <h3>Searchha - Featured Newest Project</h3>
                                <p>Full-Stack Developer | Laravel, Blade, Vite | 3 months | searchha.com</p>
                            </div>
                        </article>
                        <article class="media-card" data-tilt>
                            <picture><img src="/media/placeholders/project-grid-01.svg" alt="Project gallery placeholder one" width="1400" height="900" loading="lazy" decoding="async"></picture>
                            <div class="media-copy"><h3>Web/App Screenshot Slot</h3><p>Replace with real capture from shipped products.</p></div>
                        </article>
                        <article class="media-card" data-tilt>
                            <picture><img src="/media/placeholders/project-grid-02.svg" alt="Project gallery placeholder two" width="1400" height="900" loading="lazy" decoding="async"></picture>
                            <div class="media-copy"><h3>UX Flow Slot</h3><p>Optimized placeholder with fixed ratio and no layout shift.</p></div>
                        </article>
                        <article class="media-card" data-tilt>
                            <picture><img src="/media/placeholders/profile-shot.svg" alt="Professional portrait placeholder" width="900" height="1100" loading="lazy" decoding="async"></picture>
                            <div class="media-copy"><h3>Profile Media Slot</h3><p>Use this slot for a professional headshot.</p></div>
                        </article>
                    </div>
                </div>
            </section>

            <section>
                <div class="section-inner">
                    <div class="glass-card contact-panel" data-reveal>
                        <span class="kicker">Contact</span>
                        <h2 style="margin:0; font-size:clamp(1.55rem,3.2vw,2.3rem);">Available for full-stack and Flutter product delivery.</h2>
                        <p>Focused on architecture quality, interactive UI systems, and reliable release execution for production teams.</p>
                        <div class="cta-row">
                            <a class="button button-primary" href="https://www.linkedin.com/in/mohammad-aghajani-435830206" target="_blank" rel="noopener">Connect on LinkedIn</a>
                            <a class="button button-ghost" href="https://github.com/mhmdmediqo" target="_blank" rel="noopener">Review GitHub</a>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer class="footer">
            <div class="section-inner">
                <span>Mohammad Aghajani</span>
                <span>Fullscreen 3D resume portfolio</span>
            </div>
        </footer>
    </div>

    <script>
        (() => {
            const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
            const revealItems = Array.from(document.querySelectorAll("[data-reveal]"));
            const tiltItems = Array.from(document.querySelectorAll("[data-tilt]"));
            const parallaxContainers = Array.from(document.querySelectorAll("[data-parallax]"));

            revealItems.forEach((item, i) => {
                item.style.transitionDelay = `${Math.min(i * 28, 220)}ms`;
            });

            if (!prefersReducedMotion && "IntersectionObserver" in window) {
                const revealObserver = new IntersectionObserver((entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add("is-visible");
                        }
                    });
                }, { threshold: 0.18, rootMargin: "0px 0px -8% 0px" });
                revealItems.forEach((item) => revealObserver.observe(item));
            } else {
                revealItems.forEach((item) => item.classList.add("is-visible"));
            }

            if (!prefersReducedMotion) {
                const applyTilt = (el, x, y, depth = 10) => {
                    const rect = el.getBoundingClientRect();
                    const px = ((x - rect.left) / rect.width) * 2 - 1;
                    const py = ((y - rect.top) / rect.height) * 2 - 1;
                    const rx = (-py * 8).toFixed(2);
                    const ry = (px * 10).toFixed(2);
                    el.style.transform = `rotateX(${rx}deg) rotateY(${ry}deg) translateZ(${depth}px)`;
                };

                tiltItems.forEach((item) => {
                    item.addEventListener("pointermove", (event) => {
                        window.requestAnimationFrame(() => applyTilt(item, event.clientX, event.clientY));
                    });
                    item.addEventListener("pointerleave", () => {
                        item.style.transform = "";
                    });
                });

                const onScrollDepth = () => {
                    const offset = window.scrollY * 0.06;
                    parallaxContainers.forEach((wrap) => {
                        wrap.style.transform = `translate3d(0, ${Math.max(-22, -offset)}px, 0)`;
                    });
                };
                window.addEventListener("scroll", () => window.requestAnimationFrame(onScrollDepth), { passive: true });
                onScrollDepth();
            }

        })();
    </script>
</body>
</html>
