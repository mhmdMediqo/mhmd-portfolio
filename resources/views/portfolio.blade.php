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
        .section-inner,
        .footer-inner {
            width: min(calc(100% - 2rem), var(--max));
            margin: 0 auto;
        }

        section { padding: var(--section-pad) 0; }

        .hero {
            --hero-progress: 0;
            min-height: 220svh;
            padding: 0;
            position: relative;
        }

        .hero-stage {
            position: sticky;
            top: 0;
            min-height: 100svh;
            overflow: clip;
            background: #030811;
        }

        .hero-media,
        .hero-scrim {
            position: absolute;
            inset: 0;
        }

        .hero-media {
            overflow: hidden;
        }

        .hero-video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center center;
            filter: saturate(0.92) contrast(1.04) brightness(0.68);
            transition: filter 220ms ease;
            transform:
                scale(calc(1.06 + (var(--hero-progress) * 0.1)))
                translateY(calc(var(--hero-progress) * 2.8rem));
            transform-origin: center center;
        }

        .hero-scrim {
            background:
                linear-gradient(180deg, rgba(3, 8, 17, 0.18) 0%, rgba(3, 8, 17, 0.06) 22%, rgba(3, 8, 17, 0.34) 58%, rgba(3, 8, 17, 0.86) 100%),
                linear-gradient(90deg, rgba(3, 8, 17, 0.76) 0%, rgba(3, 8, 17, 0.18) 40%, rgba(3, 8, 17, 0.54) 100%);
        }

        .hero-grid {
            position: relative;
            z-index: 1;
            width: min(calc(100% - 2rem), var(--max));
            min-height: 100svh;
            margin: 0 auto;
            padding: clamp(1.2rem, 2vw, 1.6rem) 0 clamp(2rem, 4.5vw, 3.5rem);
            display: grid;
            align-content: space-between;
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

        .hero-copy {
            max-width: min(34rem, 100%);
            display: grid;
            gap: 1rem;
            align-self: end;
            transform: translateY(calc(var(--hero-progress) * 4.5rem));
            opacity: max(0, calc(1 - (var(--hero-progress) * 1.15)));
            will-change: transform, opacity;
        }

        .hero-copy p {
            margin: 0;
            max-width: 29rem;
            color: rgba(238, 245, 255, 0.78);
            font-size: clamp(1rem, 1.2vw, 1.08rem);
            line-height: 1.85;
        }

        .hero-meta {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 1rem;
            padding-top: 1rem;
            border-top: 1px solid rgba(255,255,255,0.1);
            opacity: max(0, calc(1 - (var(--hero-progress) * 0.95)));
            transform: translateY(calc(var(--hero-progress) * 2rem));
            will-change: transform, opacity;
        }

        .hero-signal {
            display: grid;
            gap: 0.4rem;
        }

        .hero-signal strong {
            margin: 0;
            font-family: "Sora", sans-serif;
            font-size: clamp(1.5rem, 2.8vw, 2.6rem);
            line-height: 0.98;
            max-width: 10ch;
        }

        .hero-signal span,
        .hero-scroll {
            color: rgba(238, 245, 255, 0.64);
            font-size: 0.92rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .hero-scroll {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            white-space: nowrap;
        }

        .hero-scroll::before {
            content: "";
            width: 3.25rem;
            height: 1px;
            background: linear-gradient(90deg, rgba(114, 244, 204, 0), rgba(114, 244, 204, 0.82));
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

        .hero-point p,
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
            border: 1px solid var(--line);
            border-radius: 22px;
            background: linear-gradient(180deg, rgba(10, 19, 30, 0.72), rgba(6, 12, 20, 0.42));
            backdrop-filter: blur(16px);
        }

        .card { padding: 1.15rem; }

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
            .hero-copy,
            .hero-meta,
            .hero-video {
                opacity: 1;
                transform: none;
            }
        }

        @media (max-width: 980px) {
            .hero {
                min-height: 180svh;
            }

            .hero-grid,
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

            .hero-grid {
                padding: 1rem 0 1.5rem;
            }

            .hero-copy {
                gap: 0.85rem;
                max-width: 100%;
            }

            .hero-meta {
                align-items: start;
                flex-direction: column;
            }

            .hero-signal strong {
                max-width: 12ch;
            }
        }
    </style>
</head>
<body>
    <div class="shell">
        <main id="home">
            <section class="hero" data-cinematic-hero>
                <div class="hero-stage">
                    <div class="hero-media" aria-hidden="true">
                        <video
                            class="hero-video"
                            data-cinematic-video
                            muted
                            playsinline
                            preload="auto"
                            poster="output/cinematic-frame-01.jpg"
                            src="user_files/01-kling_20260220_-__222_0.mp4"
                        ></video>
                    </div>
                    <div class="hero-scrim" aria-hidden="true"></div>

                    <div class="hero-grid">
                        <div class="hero-copy">
                            <div class="identity" aria-label="Portfolio owner">
                                <span class="brand-mark">MA</span>
                                <span>Mohammad Aghajani</span>
                            </div>
                            <span class="eyebrow">Cinematic Scroll</span>
                            <p>
                                A minimal opening built around motion, atmosphere, and controlled pacing.
                            </p>
                        </div>

                        <div class="hero-meta" aria-label="Hero cues">
                            <div class="hero-signal">
                                <span>Section One</span>
                                <strong>Motion first. Introduction next.</strong>
                            </div>
                            <div class="hero-scroll">Scroll to enter</div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="about">
                <div class="section-inner">
                    <div class="section-heading">
                        <span class="micro-label">About</span>
                        <h2>Flutter engineer building healthcare, B2B, and consumer products.</h2>
                        <p>
                            I work where frontend polish, dependable architecture, and real delivery pressure meet. The focus is calm interfaces, strong implementation quality, and software that stays clear as products grow.
                        </p>
                    </div>
                    <div class="grid-12">
                        <div class="story-copy">
                            <p>
                                Across healthcare, consumer, B2B, and fitness products, I usually work on the parts that most affect day-to-day product quality: responsive interfaces, data flow, performance, debugging, and the details that make software feel intentional instead of generic.
                            </p>
                            <p>
                                The throughline is simple: build products that look calm, work fast, and remain maintainable as features grow.
                            </p>
                            <ul class="chips" aria-label="Core strengths">
                                <li>Flutter web and mobile</li>
                                <li>Product UI implementation</li>
                                <li>Healthcare product delivery</li>
                                <li>API integration</li>
                                <li>Performance optimization</li>
                                <li>Clean architecture</li>
                            </ul>
                        </div>
                        <aside class="story-side">
                            <div class="card">
                                <h3>Current direction</h3>
                                <p>Healthcare-focused Flutter work with web performance, secure flows, and reliable product delivery at the center.</p>
                            </div>
                            <div class="card">
                                <h3>Working style</h3>
                                <p>Thoughtful UI, clean boundaries, steady iteration, and shipping in steps that keep the product understandable.</p>
                            </div>
                        </aside>
                    </div>
                </div>
            </section>

            <section id="experience">
                <div class="section-inner">
                    <div class="section-heading">
                        <span class="micro-label">Resume</span>
                        <h2>Recent roles and the product contexts behind them.</h2>
                        <p>
                            A tighter snapshot of the work across healthcare, consumer, learning, fitness, logistics, and B2B products.
                        </p>
                    </div>
                    <div class="experience-grid">
                        <article class="timeline-item">
                            <div class="timeline-meta">
                                <span>TECHTiQ</span>
                                <span>Dec 2024 - Present</span>
                                <span>Healthcare</span>
                            </div>
                            <h3>Flutter Team Lead</h3>
                            <p>Designing and building a healthcare web application with scalable architecture, code review, strong performance, real-time communication, and secure data handling.</p>
                        </article>

                        <article class="timeline-item">
                            <div class="timeline-meta">
                                <span>Joghd</span>
                                <span>Jun 2024 - Oct 2024</span>
                                <span>Quiz App</span>
                            </div>
                            <h3>Senior Flutter Developer</h3>
                            <p>Built an interactive quiz product for Iranian users with cross-platform UI work, backend integration, testing, debugging, and continuous feature improvement from user feedback.</p>
                        </article>

                        <article class="timeline-item">
                            <div class="timeline-meta">
                                <span>Isfaf</span>
                                <span>Mar 2024 - Sep 2024</span>
                                <span>Fitness Tracking</span>
                            </div>
                            <h3>Senior Flutter Developer</h3>
                            <p>Worked on the Gamiran fitness application with step and calorie tracking, running events, real-time data work, and performance-focused mobile UX.</p>
                        </article>

                        <article class="timeline-item">
                            <div class="timeline-meta">
                                <span>Searchha</span>
                                <span>Aug 2024</span>
                                <span>B2B</span>
                            </div>
                            <h3>Senior Flutter Developer</h3>
                            <p>Supported a B2B product with scalable architecture, API integration, usability iteration, app analytics, and strong product-focused implementation.</p>
                        </article>

                        <article class="timeline-item timeline-item--wide">
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

                        <article class="timeline-item">
                            <div class="timeline-meta">
                                <span>T.Tab</span>
                                <span>Aug 2022 - Jun 2023</span>
                                <span>Logistics</span>
                            </div>
                            <h3>Flutter Developer</h3>
                            <p>Developed a transport application for moving-company staff with user-friendly Flutter UI, real-time tracking, operational efficiency improvements, and day-to-day debugging.</p>
                        </article>

                        <article class="timeline-item">
                            <div class="timeline-meta">
                                <span>chitan peitan</span>
                                <span>Sep 2022 - Dec 2022</span>
                                <span>Contract</span>
                            </div>
                            <h3>Flutter Developer</h3>
                            <p>Delivered Android, iOS, and web work with Flutter using Get It, Bloc and Cubit, Dio, and repository-oriented architecture patterns.</p>
                        </article>

                        <article class="timeline-item">
                            <div class="timeline-meta">
                                <span>mobin khodro</span>
                                <span>Apr 2022 - Jul 2022</span>
                                <span>Automation</span>
                            </div>
                            <h3>Flutter Developer</h3>
                            <p>Worked on the automation application for Mobin Khodro with Flutter and Git-based collaboration in an Iran-based freelance setup.</p>
                        </article>

                        <article class="timeline-item">
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
                    <div class="section-heading">
                        <span class="micro-label">Focus</span>
                        <h2>What the work usually centers on.</h2>
                        <p>
                            The strongest fit is where frontend quality, product clarity, and dependable engineering all need to move together.
                        </p>
                    </div>
                    <div class="focus-grid">
                        <article class="card">
                            <h3>Product UI</h3>
                            <p>Responsive Flutter interfaces, interaction polish, and screen systems that stay readable and calm on web and mobile.</p>
                        </article>
                        <article class="card">
                            <h3>Architecture</h3>
                            <p>Practical state boundaries, API integration, clean feature structure, and code that stays maintainable as the product grows.</p>
                        </article>
                        <article class="card">
                            <h3>Delivery</h3>
                            <p>Healthcare, B2B, logistics, learning, and fitness products where quality, speed, and trust all matter at the same time.</p>
                        </article>
                    </div>
                </div>
            </section>

            <section id="contact">
                <div class="section-inner">
                    <div class="section-heading">
                        <span class="micro-label">Contact</span>
                        <h2>Open for strong Flutter product work.</h2>
                        <p>
                            The best direct contact on this page is LinkedIn, with GitHub included as a second reference point for current work.
                        </p>
                    </div>
                    <div class="grid-12">
                        <div class="story-copy">
                            <div class="card">
                                <h3>Best fit</h3>
                                <p>Healthcare products, senior Flutter roles, web and mobile UI implementation, API-heavy apps, and teams that want clean execution without unnecessary complexity.</p>
                            </div>
                        </div>
                        <aside class="story-side">
                            <div class="card">
                                <h3>Start conversation</h3>
                                <div class="contact-actions">
                                    <a class="button button-primary" href="https://www.linkedin.com/in/mohammad-aghajani-435830206">LinkedIn</a>
                                    <a class="button button-secondary" href="https://github.com/mhmdMediqo">GitHub</a>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </section>
        </main>

        <footer class="footer">
            <div class="footer-inner">
                <span>Mohammad Aghajani</span>
                <span>Flutter product engineering across web and mobile</span>
            </div>
        </footer>
    </div>

    <script>
        (() => {
            const hero = document.querySelector("[data-cinematic-hero]");
            const video = document.querySelector("[data-cinematic-video]");

            if (!hero || !video) {
                return;
            }

            const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
            let duration = 0;
            let targetTime = 0;
            let renderedTime = 0;

            const clamp = (value, min, max) => Math.min(max, Math.max(min, value));

            const updateHeroProgress = () => {
                const totalScroll = Math.max(hero.offsetHeight - window.innerHeight, 1);
                const progress = clamp((window.scrollY - hero.offsetTop) / totalScroll, 0, 1);

                hero.style.setProperty("--hero-progress", progress.toFixed(4));

                if (duration > 0 && !prefersReducedMotion) {
                    targetTime = progress * Math.max(duration - 0.08, 0);
                }
            };

            const animateVideo = () => {
                if (duration > 0 && !prefersReducedMotion) {
                    renderedTime += (targetTime - renderedTime) * 0.14;

                    if (Math.abs(renderedTime - targetTime) < 0.0025) {
                        renderedTime = targetTime;
                    }

                    if (Math.abs(video.currentTime - renderedTime) > 0.033) {
                        try {
                            video.currentTime = renderedTime;
                        } catch (error) {
                            // Ignore occasional seek jitter while metadata settles.
                        }
                    }
                }

                requestAnimationFrame(animateVideo);
            };

            video.muted = true;
            video.playsInline = true;

            video.addEventListener("loadedmetadata", () => {
                duration = video.duration || 0;

                if (prefersReducedMotion && duration > 0) {
                    video.currentTime = Math.min(duration * 0.15, duration);
                } else {
                    video.pause();
                    updateHeroProgress();
                }
            });

            updateHeroProgress();
            animateVideo();

            window.addEventListener("scroll", updateHeroProgress, { passive: true });
            window.addEventListener("resize", updateHeroProgress);
        })();
    </script>
</body>
</html>