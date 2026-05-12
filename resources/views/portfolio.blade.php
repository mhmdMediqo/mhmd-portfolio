<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mohammad Aghajani | Full-Stack Product Engineer</title>
    <meta
        name="description"
        content="Personal portfolio for Mohammad Aghajani, a full-stack product engineer working across Laravel, frontend systems, Flutter mobile apps, and AI-driven workflows."
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
            --ease-out: cubic-bezier(0.22, 1, 0.36, 1);
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
            animation: gridShift 22s linear infinite;
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
            animation: ambientPulse 14s var(--ease-out) infinite alternate;
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
            min-height: 92svh;
            display: grid;
            align-items: center;
            padding-top: clamp(2rem, 5vw, 4rem);
            padding-bottom: clamp(2.5rem, 5vw, 4rem);
        }

        .hero-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.12fr) minmax(280px, 0.88fr);
            gap: clamp(1.6rem, 3vw, 2.75rem);
            align-items: center;
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
            animation: badgeFloat 5.5s var(--ease-out) infinite;
            transition: transform 220ms var(--ease-out), box-shadow 220ms ease;
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
            transform-origin: left;
            animation: lineGlow 2.8s ease-in-out infinite;
        }

        .hero-copy {
            display: grid;
            gap: 1rem;
        }

        .hero-copy > * {
            opacity: 0;
            transform: translateY(24px);
            animation: heroRise 0.85s var(--ease-out) forwards;
        }

        .hero-copy > *:nth-child(1) { animation-delay: 0.08s; }
        .hero-copy > *:nth-child(2) { animation-delay: 0.16s; }
        .hero-copy > *:nth-child(3) { animation-delay: 0.24s; }
        .hero-copy > *:nth-child(4) { animation-delay: 0.34s; }
        .hero-copy > *:nth-child(5) { animation-delay: 0.44s; }

        .hero-copy h1 {
            margin: 0;
            font-family: "Sora", sans-serif;
            font-size: clamp(2.45rem, 4.8vw, 4.35rem);
            line-height: 0.95;
            max-width: 9ch;
            text-wrap: balance;
        }

        .hero-copy p {
            margin: 0;
            max-width: 38rem;
            color: var(--muted);
            font-size: clamp(0.98rem, 1.2vw, 1.08rem);
            line-height: 1.75;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 0.9rem;
            margin-top: 0.6rem;
        }

        .button {
            position: relative;
            overflow: hidden;
            min-height: 50px;
            padding: 0 1.2rem;
            display: inline-flex;
            align-items: center;
            gap: 0.7rem;
            border-radius: 999px;
            border: 1px solid transparent;
            font-weight: 700;
            transition:
                transform 240ms var(--ease-out),
                border-color 200ms ease,
                background 220ms ease,
                box-shadow 220ms ease;
            will-change: transform;
        }

        .button::after {
            content: "";
            position: absolute;
            inset: -120% auto -120% -35%;
            width: 34%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.34), transparent);
            transform: rotate(16deg) translateX(-180%);
            transition: transform 520ms var(--ease-out);
            pointer-events: none;
        }

        .button:hover,
        .button:focus-visible {
            transform: translateY(-4px) scale(1.01);
        }

        .button:hover::after,
        .button:focus-visible::after {
            transform: rotate(16deg) translateX(420%);
        }

        .button-primary {
            background: linear-gradient(135deg, var(--accent), #a6e6ff);
            color: #04131a;
            box-shadow: 0 16px 42px rgba(114, 244, 204, 0.16);
        }

        .button-primary:hover,
        .button-primary:focus-visible {
            box-shadow: 0 24px 55px rgba(114, 244, 204, 0.24);
        }

        .button-secondary {
            border-color: rgba(255,255,255,0.1);
            background: rgba(255,255,255,0.03);
        }

        .button-secondary:hover,
        .button-secondary:focus-visible {
            border-color: rgba(114, 244, 204, 0.34);
            background: rgba(255,255,255,0.06);
        }

        .hero-rail {
            position: relative;
            display: grid;
            gap: 0;
            padding: clamp(1.15rem, 2.6vw, 1.85rem) 0 clamp(1.15rem, 2.2vw, 1.55rem) clamp(1.1rem, 2.4vw, 1.9rem);
            border-left: 1px solid rgba(255,255,255,0.1);
            animation: heroRailIn 860ms var(--ease-out) 120ms both;
        }

        .hero-rail::before {
            content: "";
            position: absolute;
            left: -1px;
            top: 0.6rem;
            bottom: 0.6rem;
            width: 2px;
            background: linear-gradient(180deg, rgba(114, 244, 204, 0.72), rgba(105, 184, 255, 0.18) 45%, rgba(105, 184, 255, 0));
            opacity: 0.7;
            filter: blur(0.2px);
        }

        .hero-point {
            position: relative;
            padding: 1.05rem 0 1.15rem;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            transition: transform 220ms ease, border-color 220ms ease;
            will-change: transform;
            opacity: 0;
            transform: translateY(16px);
            animation: heroPointIn 700ms var(--ease-out) forwards;
        }

        .hero-point:nth-child(1) { animation-delay: 0.22s; }
        .hero-point:nth-child(2) { animation-delay: 0.32s; }
        .hero-point:nth-child(3) { animation-delay: 0.42s; }

        .hero-point::after {
            content: "";
            position: absolute;
            inset: 0 0 auto 0;
            height: 100%;
            border-radius: 18px;
            background: linear-gradient(135deg, rgba(114, 244, 204, 0.08), transparent 60%);
            opacity: 0;
            transition: opacity 220ms ease;
            pointer-events: none;
        }

        .hero-point:hover,
        .hero-point:focus-within {
            transform: translateX(6px);
            border-color: rgba(114, 244, 204, 0.24);
        }

        .hero-point:hover::after,
        .hero-point:focus-within::after {
            opacity: 1;
        }

        .hero-point:last-child {
            padding-bottom: 0;
            border-bottom: 0;
        }

        .hero-point span {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--accent);
            font-size: 0.82rem;
            text-transform: uppercase;
            letter-spacing: 0.18em;
        }

        .hero-point strong {
            display: block;
            font-family: "Sora", sans-serif;
            font-size: clamp(1.1rem, 2vw, 1.55rem);
            margin-bottom: 0.55rem;
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
            max-width: 15ch;
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
            position: relative;
            overflow: hidden;
            border: 1px solid var(--line);
            border-radius: 22px;
            background: linear-gradient(180deg, rgba(10, 19, 30, 0.72), rgba(6, 12, 20, 0.42));
            backdrop-filter: blur(16px);
            transition:
                transform 280ms var(--ease-out),
                border-color 200ms ease,
                box-shadow 220ms ease,
                background 220ms ease;
            will-change: transform;
        }

        .card::before,
        .timeline-item::before {
            content: "";
            position: absolute;
            inset: -1px;
            border-radius: inherit;
            background: linear-gradient(135deg, rgba(114, 244, 204, 0.16), transparent 35%, rgba(105, 184, 255, 0.12) 68%, transparent 100%);
            opacity: 0;
            transition: opacity 240ms ease;
            pointer-events: none;
        }

        .card::after,
        .timeline-item::after {
            content: "";
            position: absolute;
            inset: -120% auto auto -40%;
            width: 38%;
            height: 250%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.16), transparent);
            transform: rotate(14deg) translateX(-180%);
            transition: transform 900ms var(--ease-out);
            pointer-events: none;
        }

        .card:hover,
        .card:focus-within,
        .timeline-item:hover,
        .timeline-item:focus-within {
            transform: translateY(-8px);
            border-color: rgba(114, 244, 204, 0.24);
            box-shadow: 0 26px 70px rgba(2, 9, 15, 0.3);
        }

        .card:hover::before,
        .card:focus-within::before,
        .timeline-item:hover::before,
        .timeline-item:focus-within::before {
            opacity: 1;
        }

        .card:hover::after,
        .card:focus-within::after,
        .timeline-item:hover::after,
        .timeline-item:focus-within::after {
            transform: rotate(14deg) translateX(430%);
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
            transition:
                transform 220ms var(--ease-out),
                border-color 180ms ease,
                background 180ms ease,
                color 180ms ease;
            will-change: transform;
        }

        .chips li:hover,
        .chips li:focus-visible {
            transform: translateY(-4px);
            border-color: rgba(114, 244, 204, 0.28);
            background: rgba(114, 244, 204, 0.08);
            color: #f3fffb;
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
            transition: transform 200ms var(--ease-out), border-color 180ms ease, background 180ms ease;
        }

        .timeline-item:hover .timeline-meta span,
        .timeline-item:focus-within .timeline-meta span {
            transform: translateY(-2px);
            border-color: rgba(114, 244, 204, 0.18);
            background: rgba(255,255,255,0.06);
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

        .reveal {
            opacity: 0;
            transform: translateY(32px) scale(0.985);
            transition:
                opacity 720ms var(--ease-out),
                transform 920ms var(--ease-out);
            transition-delay: calc(var(--reveal-delay, 0) * 90ms);
            will-change: opacity, transform;
        }

        .reveal.is-visible {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        @keyframes heroRise {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes heroRailIn {
            from {
                opacity: 0;
                transform: translateY(22px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes heroPointIn {
            from {
                opacity: 0;
                transform: translateY(16px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes ambientPulse {
            0% {
                transform: scale(1) translate3d(0, 0, 0);
                opacity: 0.84;
            }
            100% {
                transform: scale(1.08) translate3d(1.5%, -1.2%, 0);
                opacity: 1;
            }
        }

        @keyframes gridShift {
            0% { background-position: 0 0, 0 0; }
            100% { background-position: 0 72px, 72px 0; }
        }

        @keyframes badgeFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        @keyframes lineGlow {
            0%, 100% { opacity: 0.65; transform: scaleX(0.85); }
            50% { opacity: 1; transform: scaleX(1.05); }
        }

        @media (max-width: 980px) {
            .hero {
                min-height: auto;
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

            .hero-rail {
                padding: 0.75rem 0 0;
                border-left: 0;
                border-top: 1px solid rgba(255,255,255,0.08);
            }

            .hero-rail::before {
                display: none;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation: none !important;
                transition: none !important;
                scroll-behavior: auto !important;
            }

            .reveal,
            .hero-copy > *,
            .hero-rail,
            .hero-point {
                opacity: 1 !important;
                transform: none !important;
            }
        }
    </style>
</head>
<body>
    <div class="shell">
        <main id="home">
            <section class="hero">
                <div class="section-inner hero-grid">
                    <div class="hero-copy">
                        <div class="identity" aria-label="Portfolio owner">
                            <span class="brand-mark">MA</span>
                            <span>Mohammad Aghajani</span>
                        </div>
                        <span class="eyebrow">Backend • Frontend • Mobile • AI Workflows</span>
                        <h1>I build products across backend, frontend, mobile, and AI workflows.</h1>
                        <p>
                            My work spans Laravel backends, Blade and Vite frontends, Flutter mobile apps, GitHub CI/CD workflows, and AI-assisted systems. I care about clear product thinking, reliable execution, and software that stays maintainable as it grows.
                        </p>
                        <div class="hero-actions">
                            <a class="button button-primary" href="https://www.linkedin.com/in/mohammad-aghajani-435830206">Start conversation</a>
                            <a class="button button-secondary" href="#experience">View resume</a>
                        </div>
                    </div>

                    <div class="hero-rail" aria-label="Current work snapshot">
                        <article class="hero-point">
                            <span>Now</span>
                            <strong>TECHTiQ</strong>
                            <p>Working on healthcare product delivery with strong attention to reliability, clear collaboration, and production-minded engineering decisions.</p>
                        </article>
                        <article class="hero-point">
                            <span>Full-stack work</span>
                            <strong>Searchha</strong>
                            <p>Handled the backend with Laravel, the frontend with Blade and Vite, and the mobile application with Flutter in one B2B product workflow.</p>
                        </article>
                        <article class="hero-point">
                            <span>Strengths</span>
                            <strong>Review, debugging, delivery, and prompts</strong>
                            <p>I contribute through code review, debugging, leadership, AI agents, and practical prompt writing that helps product teams move faster.</p>
                        </article>
                    </div>
                </div>
            </section>

            <section id="about">
                <div class="section-inner">
                    <div class="section-heading reveal">
                        <span class="micro-label">About</span>
                        <h2>Product-focused engineering across web, mobile, and AI-driven systems.</h2>
                        <p>
                            My work sits where product clarity, dependable engineering, and practical delivery meet. I care about how a product feels in use, how cleanly it is built under the surface, and how well a team can keep shipping without losing structure.
                        </p>
                    </div>
                    <div class="grid-12">
                        <div class="story-copy">
                            <p class="reveal">
                                Across healthcare, consumer, B2B, fitness, and learning products, I have worked on the parts that matter most to day-to-day product quality: backend structure, frontend implementation, mobile delivery, data flow, debugging, and the decisions that keep a system understandable as it grows.
                            </p>
                            <p class="reveal">
                                The throughline is simple: build useful software, keep the architecture clean, and make product execution feel calm instead of chaotic.
                            </p>
                            <ul class="chips" aria-label="Core strengths">
                                <li class="reveal">Flutter</li>
                                <li class="reveal">Laravel</li>
                                <li class="reveal">GitHub CI/CD workflows</li>
                                <li class="reveal">AI agents</li>
                                <li class="reveal">Prompt writing</li>
                                <li class="reveal">Leadership</li>
                                <li class="reveal">Code review</li>
                                <li class="reveal">Debugging</li>
                            </ul>
                        </div>
                        <aside class="story-side">
                            <div class="card reveal">
                                <h3>Current direction</h3>
                                <p>Full-stack product work across healthcare, B2B systems, frontend implementation, backend architecture, and AI-assisted workflows.</p>
                            </div>
                            <div class="card reveal">
                                <h3>Working style</h3>
                                <p>Clear ownership, practical engineering choices, strong review habits, and steady execution from idea to shipped product.</p>
                            </div>
                        </aside>
                    </div>
                </div>
            </section>

            <section id="experience">
                <div class="section-inner">
                    <div class="section-heading reveal">
                        <span class="micro-label">Resume</span>
                        <h2>Recent roles across product, platform, and engineering delivery.</h2>
                        <p>
                            A tighter snapshot of the work across healthcare, consumer apps, full-stack delivery, learning, fitness, logistics, and B2B products.
                        </p>
                    </div>
                    <div class="experience-grid">
                        <article class="timeline-item reveal">
                            <div class="timeline-meta">
                                <span>TECHTiQ</span>
                                <span>Dec 2024 - Present</span>
                                <span>Healthcare</span>
                            </div>
                            <h3>Flutter Team Lead</h3>
                            <p>Designing and delivering a healthcare web product with scalable architecture, code review, performance work, real-time communication, and secure data handling.</p>
                        </article>

                        <article class="timeline-item reveal">
                            <div class="timeline-meta">
                                <span>Joghd</span>
                                <span>Jun 2024 - Oct 2024</span>
                                <span>Quiz App</span>
                            </div>
                            <h3>Senior Flutter Developer</h3>
                            <p>Built an interactive quiz product for Iranian users with cross-platform UI work, backend integration, testing, debugging, and continuous feature improvement from user feedback.</p>
                        </article>

                        <article class="timeline-item reveal">
                            <div class="timeline-meta">
                                <span>Isfaf</span>
                                <span>Mar 2024 - Sep 2024</span>
                                <span>Fitness Tracking</span>
                            </div>
                            <h3>Senior Flutter Developer</h3>
                            <p>Worked on the Gamiran fitness application with step and calorie tracking, running events, real-time data work, and performance-focused mobile UX.</p>
                        </article>

                        <article class="timeline-item reveal">
                            <div class="timeline-meta">
                                <span>Searchha</span>
                                <span>Aug 2024</span>
                                <span>B2B</span>
                            </div>
                            <h3>Full-Stack Product Engineer</h3>
                            <p>Worked full stack on Searchha with Laravel on the backend, Blade and Vite on the frontend, and Flutter for the mobile app, helping shape product flow, integration logic, and day-to-day delivery.</p>
                        </article>

                        <article class="timeline-item timeline-item--wide reveal">
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

                        <article class="timeline-item reveal">
                            <div class="timeline-meta">
                                <span>T.Tab</span>
                                <span>Aug 2022 - Jun 2023</span>
                                <span>Logistics</span>
                            </div>
                            <h3>Flutter Developer</h3>
                            <p>Developed a transport application for moving-company staff with user-friendly UI, real-time tracking, operational efficiency improvements, and day-to-day debugging.</p>
                        </article>

                        <article class="timeline-item reveal">
                            <div class="timeline-meta">
                                <span>chitan peitan</span>
                                <span>Sep 2022 - Dec 2022</span>
                                <span>Contract</span>
                            </div>
                            <h3>Flutter Developer</h3>
                            <p>Delivered Android, iOS, and web work using Get It, Bloc and Cubit, Dio, and repository-oriented architecture patterns.</p>
                        </article>

                        <article class="timeline-item reveal">
                            <div class="timeline-meta">
                                <span>mobin khodro</span>
                                <span>Apr 2022 - Jul 2022</span>
                                <span>Automation</span>
                            </div>
                            <h3>Flutter Developer</h3>
                            <p>Worked on the automation application for Mobin Khodro with product implementation, debugging, and Git-based collaboration in a freelance setup.</p>
                        </article>

                        <article class="timeline-item reveal">
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
                    <div class="section-heading reveal">
                        <span class="micro-label">Focus</span>
                        <h2>How I usually contribute to a team.</h2>
                        <p>
                            The strongest fit is where product thinking, engineering clarity, and steady delivery all need to move together.
                        </p>
                    </div>
                    <div class="focus-grid">
                        <article class="card reveal">
                            <h3>Full-stack delivery</h3>
                            <p>Backend, frontend, and mobile work that stays aligned around the actual product instead of drifting into disconnected pieces.</p>
                        </article>
                        <article class="card reveal">
                            <h3>Review and debugging</h3>
                            <p>Code review, problem solving, debugging, and technical judgment that help keep product quality high without slowing the team down.</p>
                        </article>
                        <article class="card reveal">
                            <h3>AI-assisted execution</h3>
                            <p>Prompt writing, AI agents, delivery workflows, and practical automation that make engineering work faster and more repeatable.</p>
                        </article>
                    </div>
                </div>
            </section>

            <section id="contact">
                <div class="section-inner">
                    <div class="section-heading reveal">
                        <span class="micro-label">Contact</span>
                        <h2>Open for strong product and engineering work.</h2>
                        <p>
                            The best direct contact on this page is LinkedIn, with GitHub included as a second reference point for current work.
                        </p>
                    </div>
                    <div class="grid-12">
                        <div class="story-copy">
                            <div class="card reveal">
                                <h3>Best fit</h3>
                                <p>Full-stack product roles, Laravel and frontend systems, mobile delivery, AI-agent workflows, code review, debugging, and teams that value clear ownership and reliable execution.</p>
                            </div>
                        </div>
                        <aside class="story-side">
                            <div class="card reveal">
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
            <div class="footer-inner reveal">
                <span>Mohammad Aghajani</span>
                <span>Product engineering across backend, frontend, mobile, and AI workflows</span>
            </div>
        </footer>
    </div>

    <script>
        (() => {
            const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

            if (!prefersReducedMotion) {
                const revealItems = document.querySelectorAll('.reveal');
                revealItems.forEach((item, index) => {
                    item.style.setProperty('--reveal-delay', index % 6);
                });

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible');
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.18,
                    rootMargin: '0px 0px -8% 0px'
                });

                revealItems.forEach((item) => observer.observe(item));
            } else {
                document.querySelectorAll('.reveal').forEach((item) => item.classList.add('is-visible'));
            }
        })();
    </script>
</body>
</html>
