<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mohammad Aghajani | Flutter Product Engineer</title>
    <meta
        name="description"
        content="Personal portfolio for Mohammad Aghajani, a Flutter engineer building healthcare, B2B, and consumer products across web and mobile."
    >
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700&family=Sora:wght@500;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #06111a;
            --bg-soft: #0c1826;
            --panel: rgba(9, 18, 28, 0.74);
            --panel-strong: rgba(11, 21, 34, 0.9);
            --line: rgba(146, 196, 255, 0.16);
            --text: #eef5ff;
            --muted: #9cb0cb;
            --accent: #72f4cc;
            --accent-2: #69b8ff;
            --accent-3: #ffaf78;
            --max: 1180px;
            --section-pad: clamp(3.25rem, 6vw, 5.5rem);
        }

        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body {
            margin: 0;
            font-family: "Space Grotesk", sans-serif;
            color: var(--text);
            background:
                radial-gradient(circle at 18% 18%, rgba(105, 184, 255, 0.18), transparent 28%),
                radial-gradient(circle at 84% 12%, rgba(114, 244, 204, 0.14), transparent 24%),
                radial-gradient(circle at 70% 68%, rgba(255, 175, 120, 0.10), transparent 22%),
                linear-gradient(180deg, #040a10 0%, #08131d 42%, #03070c 100%);
            overflow-x: hidden;
            cursor: default;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            background-image:
                linear-gradient(rgba(255,255,255,0.028) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.028) 1px, transparent 1px);
            background-size: 72px 72px;
            mask-image: radial-gradient(circle at center, black 26%, transparent 82%);
            opacity: 0.55;
        }

        body::after {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            background:
                radial-gradient(circle at 22% 32%, rgba(114, 244, 204, 0.10), transparent 22%),
                radial-gradient(circle at 78% 24%, rgba(105, 184, 255, 0.12), transparent 24%),
                radial-gradient(circle at 52% 82%, rgba(255, 175, 120, 0.08), transparent 20%);
            filter: blur(22px);
            opacity: 0.9;
        }

        a {
            color: inherit;
            text-decoration: none;
            cursor: pointer;
        }
        .shell { position: relative; z-index: 1; }

        [data-reveal] {
            opacity: 0;
            transform: translate3d(0, 30px, 0) scale(0.992);
            transition: opacity 620ms cubic-bezier(0.22, 1, 0.36, 1), transform 620ms cubic-bezier(0.22, 1, 0.36, 1);
            will-change: opacity, transform;
        }

        [data-reveal].is-visible {
            opacity: 1;
            transform: translate3d(0, 0, 0) scale(1);
        }
        .section-inner,
        .footer-inner {
            width: min(calc(100% - 2rem), var(--max));
            margin: 0 auto;
        }

        section {
            padding: var(--section-pad) 0;
            content-visibility: auto;
            contain-intrinsic-size: 1px 920px;
        }

        .identity {
            display: inline-flex;
            align-items: center;
            gap: 0.85rem;
            font-family: "Sora", sans-serif;
            font-weight: 700;
            font-size: 0.98rem;
        }

        .brand-mark {
            width: 46px;
            height: 46px;
            border-radius: 15px;
            display: grid;
            place-items: center;
            color: #031019;
            background: linear-gradient(135deg, var(--accent) 0%, var(--accent-2) 56%, #d5ebff 100%);
            box-shadow: 0 0 40px rgba(105, 184, 255, 0.22);
        }

        .eyebrow,
        .micro-label {
            display: inline-flex;
            align-items: center;
            gap: 0.55rem;
            color: var(--accent);
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 0.2em;
        }

        .eyebrow::before,
        .micro-label::before {
            content: "";
            width: 2rem;
            height: 1px;
            background: linear-gradient(90deg, var(--accent), transparent);
        }

        .button {
            min-height: 50px;
            padding: 0 1.2rem;
            display: inline-flex;
            align-items: center;
            gap: 0.7rem;
            border-radius: 999px;
            border: 1px solid transparent;
            font-weight: 700;
            transition: transform 180ms ease, border-color 180ms ease, background 180ms ease;
        }

        .button:hover,
        .button:focus-visible { transform: translateY(-2px); }

        .button-primary {
            background: linear-gradient(135deg, var(--accent), #a6e6ff);
            color: #04131a;
            box-shadow: 0 16px 42px rgba(114, 244, 204, 0.16);
        }

        .button-secondary {
            border-color: rgba(255,255,255,0.1);
            background: rgba(255,255,255,0.03);
        }

        .story-copy p,
        .card p,
        .timeline-item p,
        .list li {
            margin: 0;
            color: var(--muted);
            line-height: 1.72;
        }

        .section-heading {
            display: grid;
            gap: 0.85rem;
            margin-bottom: 2rem;
        }

        .section-heading h2 {
            margin: 0;
            font-family: "Sora", sans-serif;
            font-size: clamp(1.85rem, 3.6vw, 3rem);
            line-height: 1.03;
            max-width: 13ch;
        }

        .intro-name {
            display: block;
            margin-bottom: 0.85rem;
            font-size: clamp(2.2rem, 5.4vw, 4.2rem);
            line-height: 0.92;
            letter-spacing: -0.02em;
            white-space: nowrap;
            background: linear-gradient(135deg, #7cf7d1 0%, #79c6ff 48%, #ffb57b 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        #about .section-heading h2 {
            max-width: none;
        }

        .section-heading p {
            margin: 0;
            max-width: 44rem;
            color: var(--muted);
            line-height: 1.76;
        }

        .grid-12 {
            display: grid;
            grid-template-columns: repeat(12, minmax(0, 1fr));
            gap: 1rem;
        }

        .story-copy { grid-column: span 7; display: grid; gap: 1rem; }
        .story-side { grid-column: span 5; display: grid; gap: 1rem; }

        .card,
        .timeline-item {
            transform: translateZ(0);
            transition: transform 280ms ease, border-color 280ms ease, background 280ms ease;
            border: 1px solid var(--line);
            border-radius: 22px;
            background: linear-gradient(180deg, rgba(10, 19, 30, 0.72), rgba(6, 12, 20, 0.42));
            backdrop-filter: blur(16px);
        }

        .card { padding: 1.15rem; }

        .card:hover,
        .timeline-item:hover {
            transform: translate3d(0, -5px, 0);
            border-color: rgba(114, 244, 204, 0.28);
            background: linear-gradient(180deg, rgba(13, 24, 38, 0.76), rgba(8, 15, 25, 0.48));
        }

        .card h3,
        .timeline-item h3 {
            margin: 0 0 0.65rem;
            font-family: "Sora", sans-serif;
            font-size: 1.06rem;
        }

        .chips {
            display: flex;
            flex-wrap: wrap;
            gap: 0.65rem;
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .chips li {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.65rem 0.9rem;
            border-radius: 999px;
            border: 1px solid var(--line);
            background: rgba(255,255,255,0.03);
            color: #deebff;
            font-size: 0.89rem;
        }

        .experience-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 1rem;
        }

        .timeline-item {
            padding: 1.15rem 1.2rem;
            display: grid;
            gap: 0.8rem;
        }

        .timeline-item--wide {
            grid-column: span 2;
        }

        .timeline-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 0.65rem;
            color: #ddecff;
            font-size: 0.9rem;
        }

        .timeline-meta span {
            padding: 0.38rem 0.68rem;
            border-radius: 999px;
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.06);
        }

        .list {
            display: grid;
            gap: 0.8rem;
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .list li {
            padding: 0.8rem 0;
            border-bottom: 1px solid rgba(255,255,255,0.06);
        }

        .list li:last-child { border-bottom: 0; }

        .focus-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 1rem;
        }

        .contact-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 0.85rem;
            margin-top: 0.4rem;
        }

        .footer {
            padding: 1.25rem 0 2.25rem;
            color: var(--muted);
        }

        .footer-inner {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
            border-top: 1px solid rgba(255,255,255,0.08);
            padding-top: 1.15rem;
            font-size: 0.92rem;
        }

        @media (prefers-reduced-motion: reduce) {
        }

        @media (max-width: 980px) {
            .grid-12,
            .focus-grid,
            .experience-grid {
                grid-template-columns: 1fr;
            }

            .story-copy,
            .story-side,
            .timeline-item--wide {
                grid-column: span 1;
            }

        }
    </style>
</head>
<body>
    <div class="shell">
        <main id="home">
            <section id="about">
                <div class="section-inner">
                    <div class="section-heading" data-reveal>
                        <span class="micro-label">Introduction</span>
                        <h2><span class="intro-name">Mohammad Aghajani</span>Flutter engineer focused on AI agents, prompt engineering, and product automation.</h2>
                        <p>
                            I build practical AI-powered products with reliable architecture, clean UI delivery, and structured prompt systems that stay maintainable as scope grows.
                        </p>
                    </div>
                    <div class="grid-12" data-reveal>
                        <div class="story-copy">
                            <p>
                                I work on AI-agent workflows end to end: prompt design, guardrails, orchestration patterns, tool integration, and production-ready interfaces across web and mobile.
                            </p>
                            <p>
                                The core approach is simple: clear prompts, measurable behavior, and systems that deliver useful automation without losing product quality.
                            </p>
                            <ul class="chips" aria-label="Core strengths">
                                <li>AI agents workflows</li>
                                <li>Prompt engineering</li>
                                <li>Tool calling and orchestration</li>
                                <li>Flutter web and mobile</li>
                                <li>Laravel APIs integration</li>
                                <li>Performance optimization</li>
                            </ul>
                        </div>
                        <aside class="story-side" data-reveal>
                            <div class="card" data-reveal>
                                <h3>Current direction</h3>
                                <p>Building AI-agent features with robust prompting, evaluation loops, and production-grade product implementation.</p>
                            </div>
                            <div class="card" data-reveal>
                                <h3>Working style</h3>
                                <p>Prompt-first thinking, clear system boundaries, fast iteration, and shipping agent experiences that stay predictable.</p>
                            </div>
                        </aside>
                    </div>
                </div>
            </section>

            <section id="experience">
                <div class="section-inner">
                    <div class="section-heading" data-reveal>
                        <span class="micro-label">Resume</span>
                        <h2>Recent roles and the product contexts behind them.</h2>
                        <p>
                            A tighter snapshot of the work across healthcare, consumer, learning, fitness, logistics, and B2B products.
                        </p>
                    </div>
                    <div class="experience-grid" data-reveal>
                        <article class="timeline-item" data-reveal>
                            <div class="timeline-meta">
                                <span>TECHTiQ</span>
                                <span>Dec 2024 - Present</span>
                                <span>Healthcare</span>
                            </div>
                            <h3>Flutter Team Lead</h3>
                            <p>Designing and building a healthcare web application with scalable architecture, code review, strong performance, real-time communication, and secure data handling.</p>
                        </article>

                        <article class="timeline-item" data-reveal>
                            <div class="timeline-meta">
                                <span>Joghd</span>
                                <span>Jun 2024 - Oct 2024</span>
                                <span>Quiz App</span>
                            </div>
                            <h3>Senior Flutter Developer</h3>
                            <p>Built an interactive quiz product for Iranian users with cross-platform UI work, backend integration, testing, debugging, and continuous feature improvement from user feedback.</p>
                        </article>

                        <article class="timeline-item" data-reveal>
                            <div class="timeline-meta">
                                <span>Isfaf</span>
                                <span>Mar 2024 - Sep 2024</span>
                                <span>Fitness Tracking</span>
                            </div>
                            <h3>Senior Flutter Developer</h3>
                            <p>Worked on the Gamiran fitness application with step and calorie tracking, running events, real-time data work, and performance-focused mobile UX.</p>
                        </article>

                        <article class="timeline-item" data-reveal>
                            <div class="timeline-meta">
                                <span>Searchha</span>
                                <span>Aug 2024</span>
                                <span>B2B</span>
                            </div>
                            <h3>Full-Stack Developer</h3>
                            <p>Worked as a full-stack developer: Laravel backend, Flutter mobile app, Vite + Blade website frontend, and AI agents integration for product workflows.</p>
                        </article>

                        <article class="timeline-item timeline-item--wide" data-reveal>
                            <div class="timeline-meta">
                                <span>Besenior</span>
                                <span>2019 - 2024</span>
                                <span>Apps + Education</span>
                            </div>
                            <h3>Mobile product and training work across several roles</h3>
                            <ul class="list">
                                <li>Team Lead - Mobile Application Development, Feb 2024 - Sep 2024: worked on the LeagueTournament app for Android and iOS with real-time tournament management, game guides, news, and video content.</li>
                                <li>Flutter development instructor, Feb 2021 - Sep 2024: taught project-based Flutter topics including architecture, packages, and Bloc-oriented workflows.</li>
                                <li>Android development instructor, Jan 2019 - Feb 2023: taught Android Jetpack, LiveData, Kotlin, Room, Hilt, and advanced Android development concepts.</li>
                                <li>Flutter developer, Jun 2022 - Aug 2022: built LeagueBs, an app for learning League of Legends concepts and content.</li>
                            </ul>
                        </article>

                        <article class="timeline-item" data-reveal>
                            <div class="timeline-meta">
                                <span>T.Tab</span>
                                <span>Aug 2022 - Jun 2023</span>
                                <span>Logistics</span>
                            </div>
                            <h3>Flutter Developer</h3>
                            <p>Developed a transport application for moving-company staff with user-friendly Flutter UI, real-time tracking, operational efficiency improvements, and day-to-day debugging.</p>
                        </article>

                        <article class="timeline-item" data-reveal>
                            <div class="timeline-meta">
                                <span>chitan peitan</span>
                                <span>Sep 2022 - Dec 2022</span>
                                <span>Contract</span>
                            </div>
                            <h3>Flutter Developer</h3>
                            <p>Delivered Android, iOS, and web work with Flutter using Get It, Bloc and Cubit, Dio, and repository-oriented architecture patterns.</p>
                        </article>

                        <article class="timeline-item" data-reveal>
                            <div class="timeline-meta">
                                <span>mobin khodro</span>
                                <span>Apr 2022 - Jul 2022</span>
                                <span>Automation</span>
                            </div>
                            <h3>Flutter Developer</h3>
                            <p>Worked on the automation application for Mobin Khodro with Flutter and Git-based collaboration in an Iran-based freelance setup.</p>
                        </article>

                        <article class="timeline-item" data-reveal>
                            <div class="timeline-meta">
                                <span>Pte With Ash</span>
                                <span>Jan 2020 - Jul 2021</span>
                                <span>Android</span>
                            </div>
                            <h3>Android Developer</h3>
                            <p>Built an English language learning application with Android and RxAndroid, focusing on lesson presentation, interaction flows, and smooth app behavior.</p>
                        </article>
                    </div>
                </div>
            </section>

            <section id="focus">
                <div class="section-inner">
                    <div class="section-heading" data-reveal>
                        <span class="micro-label">Focus</span>
                        <h2>What the work usually centers on.</h2>
                        <p>
                            The strongest fit is where frontend quality, product clarity, and dependable engineering all need to move together.
                        </p>
                    </div>
                    <div class="focus-grid" data-reveal>
                        <article class="card" data-reveal>
                            <h3>Product UI</h3>
                            <p>Responsive Flutter interfaces, interaction polish, and screen systems that stay readable and calm on web and mobile.</p>
                        </article>
                        <article class="card" data-reveal>
                            <h3>Architecture</h3>
                            <p>Practical state boundaries, API integration, clean feature structure, and code that stays maintainable as the product grows.</p>
                        </article>
                        <article class="card" data-reveal>
                            <h3>Delivery</h3>
                            <p>Healthcare, B2B, logistics, learning, and fitness products where quality, speed, and trust all matter at the same time.</p>
                        </article>
                    </div>
                </div>
            </section>

            <section id="contact">
                <div class="section-inner">
                    <div class="section-heading" data-reveal>
                        <span class="micro-label">Contact</span>
                        <h2>Open for strong Flutter product work.</h2>
                        <p>
                            The best direct contact on this page is LinkedIn, with GitHub included as a second reference point for current work.
                        </p>
                    </div>
                    <div class="grid-12" data-reveal>
                        <div class="story-copy">
                            <div class="card" data-reveal>
                                <h3>Best fit</h3>
                                <p>Healthcare products, senior Flutter roles, web and mobile UI implementation, API-heavy apps, and teams that want clean execution without unnecessary complexity.</p>
                            </div>
                        </div>
                        <aside class="story-side" data-reveal>
                            <div class="card" data-reveal>
                                <h3>Start conversation</h3>
                                <div class="contact-actions">
                                    <a class="button button-primary" href="https://www.linkedin.com/in/mohammad-aghajani-435830206">LinkedIn</a>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </section>
        </main>

        <footer class="footer">
            <div class="footer-inner" data-reveal>
                <span>Mohammad Aghajani</span>
                <span>Flutter product engineering across web and mobile</span>
            </div>
        </footer>
    </div>

    <script>
        (() => {
            const revealItems = Array.from(document.querySelectorAll("[data-reveal]"));
            const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

            if (!revealItems.length) {
                return;
            }

            revealItems.forEach((item, index) => {
                item.style.transitionDelay = `${Math.min(index * 20, 180)}ms`;
            });

            if (prefersReducedMotion || !("IntersectionObserver" in window)) {
                revealItems.forEach((item) => item.classList.add("is-visible"));
                return;
            }

            const revealObserver = new IntersectionObserver(
                (entries) => {
                    for (const entry of entries) {
                        if (entry.isIntersecting) {
                            entry.target.classList.add("is-visible");
                        } else if (entry.boundingClientRect.top > window.innerHeight * 0.9) {
                            entry.target.classList.remove("is-visible");
                        }
                    }
                },
                { threshold: 0.2, rootMargin: "0px 0px -8% 0px" }
            );

            revealItems.forEach((item) => revealObserver.observe(item));
        })();
    </script>
</body>
</html>
