<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mohammad Aghajani | Flutter, Laravel, Tech Lead</title>
    <meta
        name="description"
        content="Single-page portfolio for Mohammad Aghajani, focused on Flutter engineering, Laravel systems, and technical leadership."
    >
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700&family=Sora:wght@400;600;700;800&display=swap"
        rel="stylesheet"
    >
    <style>
        :root {
            --bg: #04070d;
            --bg-soft: #09111f;
            --panel: rgba(9, 17, 31, 0.48);
            --line: rgba(165, 204, 255, 0.14);
            --text: #eef5ff;
            --muted: #95a8c7;
            --accent: #67f5c7;
            --accent-2: #5bb8ff;
            --accent-3: #ff9c6b;
            --max: 1180px;
            --section-pad: clamp(4rem, 9vw, 8rem);
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: "Space Grotesk", sans-serif;
            background:
                radial-gradient(circle at 15% 20%, rgba(91, 184, 255, 0.18), transparent 32%),
                radial-gradient(circle at 85% 15%, rgba(103, 245, 199, 0.12), transparent 28%),
                radial-gradient(circle at 50% 78%, rgba(255, 156, 107, 0.08), transparent 24%),
                linear-gradient(180deg, #03060b 0%, #07101c 38%, #02050a 100%);
            color: var(--text);
            overflow-x: hidden;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
            background-size: 72px 72px;
            mask-image: radial-gradient(circle at center, black 24%, transparent 82%);
            pointer-events: none;
            opacity: 0.5;
            z-index: 0;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        canvas#scene {
            position: fixed;
            inset: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            opacity: 0.92;
            pointer-events: none;
        }

        .site-shell {
            position: relative;
            z-index: 1;
        }

        .topbar {
            position: sticky;
            top: 0;
            z-index: 20;
            backdrop-filter: blur(18px);
            background: rgba(4, 7, 13, 0.55);
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
        }

        .topbar-inner,
        .section-inner,
        .footer-inner {
            width: min(calc(100% - 2rem), var(--max));
            margin: 0 auto;
        }

        .topbar-inner {
            min-height: 76px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 0.85rem;
            font-family: "Sora", sans-serif;
            font-weight: 700;
            letter-spacing: 0;
        }

        .brand-mark {
            width: 42px;
            height: 42px;
            border-radius: 14px;
            display: grid;
            place-items: center;
            color: #031019;
            background:
                linear-gradient(135deg, var(--accent) 0%, var(--accent-2) 52%, #cce2ff 100%);
            box-shadow: 0 0 40px rgba(91, 184, 255, 0.24);
        }

        .nav {
            display: flex;
            align-items: center;
            gap: 1rem;
            color: var(--muted);
            font-size: 0.92rem;
        }

        .nav a {
            position: relative;
            padding: 0.25rem 0;
        }

        .nav a::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -0.3rem;
            width: 100%;
            height: 2px;
            transform: scaleX(0);
            transform-origin: left;
            background: linear-gradient(90deg, var(--accent), transparent);
            transition: transform 180ms ease;
        }

        .nav a:hover::after,
        .nav a:focus-visible::after {
            transform: scaleX(1);
        }

        .hero {
            min-height: calc(100svh - 76px);
            display: grid;
            align-items: center;
            padding: clamp(2.5rem, 5vw, 4rem) 0 2rem;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.15fr) minmax(280px, 0.85fr);
            gap: clamp(2rem, 5vw, 4rem);
            align-items: end;
        }

        .eyebrow,
        .micro-label {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--accent);
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.22em;
        }

        .eyebrow::before,
        .micro-label::before {
            content: "";
            width: 2.2rem;
            height: 1px;
            background: linear-gradient(90deg, var(--accent), transparent);
        }

        .hero-copy h1 {
            margin: 1.15rem 0 1rem;
            font-family: "Sora", sans-serif;
            font-size: clamp(3.2rem, 8vw, 7.2rem);
            line-height: 0.98;
            letter-spacing: 0;
            max-width: 10ch;
        }

        .hero-copy p {
            margin: 0;
            max-width: 43rem;
            color: var(--muted);
            font-size: clamp(1rem, 1.5vw, 1.18rem);
            line-height: 1.8;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 2rem;
        }

        .button {
            min-height: 52px;
            padding: 0 1.25rem;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            border-radius: 999px;
            border: 1px solid transparent;
            font-weight: 700;
            transition: transform 180ms ease, border-color 180ms ease, background 180ms ease;
        }

        .button:hover,
        .button:focus-visible {
            transform: translateY(-2px);
        }

        .button-primary {
            background: linear-gradient(135deg, var(--accent), #9ee7ff);
            color: #02131d;
            box-shadow: 0 15px 40px rgba(103, 245, 199, 0.18);
        }

        .button-secondary {
            border-color: rgba(255, 255, 255, 0.1);
            background: rgba(255, 255, 255, 0.02);
            color: var(--text);
        }

        .hero-metrics {
            display: grid;
            gap: 1rem;
            align-self: center;
        }

        .metric {
            position: relative;
            padding: 1.25rem;
            background: linear-gradient(180deg, rgba(10, 21, 38, 0.7), rgba(5, 11, 19, 0.35));
            border: 1px solid var(--line);
            border-radius: 22px;
            overflow: hidden;
            backdrop-filter: blur(16px);
        }

        .metric::before {
            content: "";
            position: absolute;
            inset: auto -20% -40% auto;
            width: 11rem;
            height: 11rem;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(103, 245, 199, 0.18), transparent 70%);
        }

        .metric strong {
            display: block;
            font-family: "Sora", sans-serif;
            font-size: clamp(1.8rem, 3vw, 2.8rem);
            margin-bottom: 0.45rem;
        }

        .metric span {
            color: var(--muted);
            line-height: 1.6;
        }

        section {
            position: relative;
            padding: var(--section-pad) 0;
        }

        .section-heading {
            display: grid;
            gap: 1rem;
            margin-bottom: 2.5rem;
        }

        .section-heading h2 {
            margin: 0;
            font-family: "Sora", sans-serif;
            font-size: clamp(2rem, 4vw, 3.5rem);
            line-height: 1.02;
        }

        .section-heading p {
            margin: 0;
            max-width: 44rem;
            color: var(--muted);
            line-height: 1.8;
            font-size: 1rem;
        }

        .story-grid,
        .project-grid,
        .contact-grid {
            display: grid;
            grid-template-columns: repeat(12, minmax(0, 1fr));
            gap: 1.25rem;
        }

        .story-copy {
            grid-column: span 7;
            display: grid;
            gap: 1rem;
        }

        .story-copy p,
        .story-list li,
        .project p,
        .contact-note p {
            color: var(--muted);
            line-height: 1.85;
            margin: 0;
        }

        .story-aside {
            grid-column: span 5;
            display: grid;
            gap: 1rem;
        }

        .tech-band {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 1rem;
        }

        .chip-cloud,
        .story-list,
        .project-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .chip-cloud li,
        .project-tags li {
            padding: 0.7rem 0.95rem;
            border: 1px solid var(--line);
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.03);
            color: #d7e6ff;
            font-size: 0.92rem;
        }

        .tech-column,
        .project,
        .contact-note {
            border: 1px solid var(--line);
            border-radius: 28px;
            background: linear-gradient(180deg, rgba(10, 21, 38, 0.6), rgba(5, 11, 19, 0.28));
            backdrop-filter: blur(16px);
            padding: 1.35rem;
        }

        .tech-column h3,
        .project h3,
        .contact-note h3 {
            margin: 0 0 0.8rem;
            font-family: "Sora", sans-serif;
            font-size: 1.2rem;
        }

        .tech-column p {
            margin: 0;
            color: var(--muted);
            line-height: 1.7;
        }

        .story-list {
            display: grid;
            gap: 1rem;
        }

        .story-list li {
            display: grid;
            gap: 0.45rem;
            padding: 1rem 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.07);
        }

        .story-list li:last-child {
            border-bottom: 0;
        }

        .story-list strong {
            color: var(--text);
            font-size: 1.05rem;
        }

        .project {
            min-height: 100%;
            display: grid;
            gap: 1rem;
        }

        .project-grid > article:nth-child(1) {
            grid-column: span 7;
        }

        .project-grid > article:nth-child(2),
        .project-grid > article:nth-child(3) {
            grid-column: span 5;
        }

        .project-mark {
            width: 58px;
            height: 58px;
            border-radius: 18px;
            display: grid;
            place-items: center;
            font-weight: 800;
            color: #02131d;
            background: linear-gradient(135deg, var(--accent-2), var(--accent));
        }

        .timeline {
            display: grid;
            gap: 1rem;
        }

        .timeline-row {
            display: grid;
            grid-template-columns: 120px 1fr;
            gap: 1rem;
            padding: 1rem 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.07);
        }

        .timeline-row:last-child {
            border-bottom: 0;
        }

        .timeline-row time {
            color: var(--accent);
            font-weight: 700;
        }

        .contact-grid {
            align-items: start;
        }

        .contact-note:first-child {
            grid-column: span 7;
        }

        .contact-note:last-child {
            grid-column: span 5;
        }

        .contact-links {
            display: grid;
            gap: 0.85rem;
            margin-top: 1rem;
        }

        .contact-links a {
            display: inline-flex;
            align-items: center;
            gap: 0.8rem;
            width: fit-content;
            color: #dce9ff;
        }

        .footer {
            padding: 1.5rem 0 2.5rem;
            color: var(--muted);
        }

        .footer-inner {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding-top: 1.25rem;
            font-size: 0.95rem;
        }

        .reveal {
            opacity: 0;
            transform: translateY(36px);
            transition: opacity 700ms ease, transform 700ms ease;
            transition-delay: var(--delay, 0ms);
        }

        .reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        @media (max-width: 960px) {
            .hero-grid,
            .story-grid,
            .project-grid,
            .contact-grid,
            .tech-band {
                grid-template-columns: 1fr;
            }

            .story-copy,
            .story-aside,
            .project-grid > article,
            .contact-note:first-child,
            .contact-note:last-child {
                grid-column: span 1;
            }

            .topbar-inner {
                min-height: 68px;
            }

            .nav {
                display: none;
            }

            .timeline-row {
                grid-template-columns: 1fr;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            html {
                scroll-behavior: auto;
            }

            .reveal {
                opacity: 1;
                transform: none;
                transition: none;
            }

            canvas#scene {
                display: none;
            }
        }
    </style>
</head>
<body>
    <canvas id="scene" aria-hidden="true"></canvas>

    <div class="site-shell">
        <header class="topbar">
            <div class="topbar-inner">
                <a class="brand" href="#home" aria-label="Mohammad Aghajani home">
                    <span class="brand-mark">MA</span>
                    <span>Mohammad Aghajani</span>
                </a>

                <nav class="nav" aria-label="Primary">
                    <a href="#story">Story</a>
                    <a href="#stack">Stack</a>
                    <a href="#projects">Projects</a>
                    <a href="#leadership">Leadership</a>
                    <a href="#contact">Contact</a>
                </nav>
            </div>
        </header>

        <main id="home">
            <section class="hero">
                <div class="section-inner hero-grid">
                    <div class="hero-copy reveal">
                        <span class="eyebrow">Flutter x Laravel x Tech Lead</span>
                        <h1>Building sharp digital products with 3D energy.</h1>
                        <p>
                            I shape product experiences at the point where polished frontend motion,
                            reliable Laravel architecture, and technical leadership need to feel like
                            one system instead of three separate jobs.
                        </p>

                        <div class="hero-actions">
                            <a class="button button-primary" href="#contact">Start a conversation</a>
                            <a class="button button-secondary" href="#projects">View selected builds</a>
                        </div>
                    </div>

                    <div class="hero-metrics">
                        <article class="metric reveal" style="--delay: 80ms">
                            <strong>Flutter</strong>
                            <span>High-fidelity mobile product work with interface systems that feel premium and fast.</span>
                        </article>
                        <article class="metric reveal" style="--delay: 160ms">
                            <strong>Laravel</strong>
                            <span>Structured backend delivery for dashboards, APIs, orchestration flows, and product admin systems.</span>
                        </article>
                        <article class="metric reveal" style="--delay: 240ms">
                            <strong>Tech Lead</strong>
                            <span>Translating product direction into architecture, execution rhythm, and reviewable delivery.</span>
                        </article>
                    </div>
                </div>
            </section>

            <section id="story">
                <div class="section-inner">
                    <div class="section-heading reveal">
                        <span class="micro-label">Core Story</span>
                        <h2>A portfolio built like a product surface, not a static profile.</h2>
                        <p>
                            This single page is designed to feel technical, cinematic, and controlled.
                            The motion language leans on depth, orbital geometry, and glassy telemetry
                            cues so the site reflects the same mindset used for modern Flutter apps,
                            Laravel platforms, and leadership-level product execution.
                        </p>
                    </div>

                    <div class="story-grid">
                        <div class="story-copy reveal">
                            <p>
                                The visual direction mixes a dark control-room atmosphere with a live
                                3D field running behind the content. That lets the page feel ambitious
                                without drowning the actual message: product craft, backend systems,
                                and team-level technical direction.
                            </p>
                            <p>
                                The page keeps everything on one scroll path. Visitors get the brand
                                signal immediately, then move through capability, selected project
                                frames, leadership perspective, and contact without mode switching.
                            </p>

                            <ul class="chip-cloud" aria-label="Core capabilities">
                                <li>Single-page portfolio</li>
                                <li>Three.js depth field</li>
                                <li>Scroll reveal choreography</li>
                                <li>Premium dark-tech aesthetic</li>
                                <li>Laravel Blade delivery</li>
                            </ul>
                        </div>

                        <aside class="story-aside reveal" style="--delay: 120ms">
                            <div class="tech-column">
                                <h3>What the motion is saying</h3>
                                <p>
                                    Rotating 3D forms suggest systems thinking. Particle movement hints
                                    at engineering flow. Layered reveals keep the page feeling alive while
                                    the text remains readable and disciplined.
                                </p>
                            </div>
                            <div class="tech-column">
                                <h3>Why it still stays usable</h3>
                                <p>
                                    The content sits on calm reading zones, the navigation stays simple,
                                    and reduced-motion users automatically get a lighter experience.
                                </p>
                            </div>
                        </aside>
                    </div>
                </div>
            </section>

            <section id="stack">
                <div class="section-inner">
                    <div class="section-heading reveal">
                        <span class="micro-label">Technical Stack</span>
                        <h2>Three strengths, one operating model.</h2>
                        <p>
                            The strongest work happens when interface craft, backend clarity, and leadership
                            cadence are all designed together. That is the thread running through this portfolio.
                        </p>
                    </div>

                    <div class="tech-band">
                        <article class="tech-column reveal">
                            <h3>Flutter Product Craft</h3>
                            <p>
                                Responsive interface systems, animation strategy, clean widget boundaries,
                                and app experiences that feel deliberate on every screen size.
                            </p>
                        </article>
                        <article class="tech-column reveal" style="--delay: 100ms">
                            <h3>Laravel Platform Thinking</h3>
                            <p>
                                APIs, admin workflows, service boundaries, validation, authorization,
                                and backend structure that can support real product growth.
                            </p>
                        </article>
                        <article class="tech-column reveal" style="--delay: 200ms">
                            <h3>Leadership and Delivery</h3>
                            <p>
                                Turning ambiguous ideas into milestones, shaping implementation order,
                                and keeping design, engineering, and shipping rhythm aligned.
                            </p>
                        </article>
                    </div>
                </div>
            </section>

            <section id="projects">
                <div class="section-inner">
                    <div class="section-heading reveal">
                        <span class="micro-label">Selected Directions</span>
                        <h2>Project frames built around product clarity and technical weight.</h2>
                        <p>
                            These are portfolio-style showcase blocks, written to highlight the kind of
                            work this personal site is meant to attract.
                        </p>
                    </div>

                    <div class="project-grid">
                        <article class="project reveal">
                            <div class="project-mark">F</div>
                            <h3>Immersive Flutter product surface</h3>
                            <p>
                                A polished mobile experience with layered motion, tight component systems,
                                and interaction details that feel premium instead of generic.
                            </p>
                            <ul class="project-tags">
                                <li>Motion systems</li>
                                <li>Responsive UI</li>
                                <li>Design handoff</li>
                                <li>Feature structure</li>
                            </ul>
                        </article>

                        <article class="project reveal" style="--delay: 120ms">
                            <div class="project-mark">L</div>
                            <h3>Laravel operations core</h3>
                            <p>
                                A backend center for dashboards, APIs, permissions, and admin workflows,
                                designed to stay understandable as the product gets bigger.
                            </p>
                            <ul class="project-tags">
                                <li>Controllers and services</li>
                                <li>Validation</li>
                                <li>Policies</li>
                                <li>Queue-ready flows</li>
                            </ul>
                        </article>

                        <article class="project reveal" style="--delay: 220ms">
                            <div class="project-mark">TL</div>
                            <h3>Execution leadership</h3>
                            <p>
                                Breaking product ambition into small reviewable steps, reducing delivery
                                risk, and keeping visual quality high without losing engineering discipline.
                            </p>
                            <ul class="project-tags">
                                <li>PR sequencing</li>
                                <li>Scope control</li>
                                <li>Architecture decisions</li>
                                <li>Delivery rhythm</li>
                            </ul>
                        </article>
                    </div>
                </div>
            </section>

            <section id="leadership">
                <div class="section-inner">
                    <div class="section-heading reveal">
                        <span class="micro-label">Leadership View</span>
                        <h2>From idea to shipped system.</h2>
                        <p>
                            The strongest technical leadership is not only about reviewing code. It is
                            about choosing the right level of ambition, protecting momentum, and making
                            the final product feel coherent from design to deployment.
                        </p>
                    </div>

                    <div class="story-grid">
                        <div class="story-copy reveal">
                            <div class="timeline">
                                <div class="timeline-row">
                                    <time>01</time>
                                    <div>
                                        <strong>Shape the product direction</strong>
                                        <p>Clarify the goal, the user flow, and the visual bar before implementation starts.</p>
                                    </div>
                                </div>
                                <div class="timeline-row">
                                    <time>02</time>
                                    <div>
                                        <strong>Design the technical path</strong>
                                        <p>Choose where logic belongs, how modules stay clean, and how the work can ship safely.</p>
                                    </div>
                                </div>
                                <div class="timeline-row">
                                    <time>03</time>
                                    <div>
                                        <strong>Keep quality visible</strong>
                                        <p>Protect the details that make software feel premium: motion, polish, naming, and review discipline.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <aside class="story-aside reveal" style="--delay: 140ms">
                            <ul class="story-list">
                                <li>
                                    <strong>Architecture with restraint</strong>
                                    <span>Scalable enough to grow, simple enough to move fast.</span>
                                </li>
                                <li>
                                    <strong>Product-minded prioritization</strong>
                                    <span>Complexity should serve the result, not the ego of the system.</span>
                                </li>
                                <li>
                                    <strong>Reviewable delivery</strong>
                                    <span>Small clear changesets are easier to trust, merge, and maintain.</span>
                                </li>
                            </ul>
                        </aside>
                    </div>
                </div>
            </section>

            <section id="contact">
                <div class="section-inner">
                    <div class="section-heading reveal">
                        <span class="micro-label">Contact</span>
                        <h2>Let’s build something sharp.</h2>
                        <p>
                            This template is ready to be personalized further with your exact experience,
                            live project links, resume details, and preferred contact channels.
                        </p>
                    </div>

                    <div class="contact-grid">
                        <article class="contact-note reveal">
                            <h3>Best fit for this portfolio style</h3>
                            <p>
                                Senior Flutter roles, Laravel full-stack work, product engineering, platform
                                architecture, and tech lead collaborations where visual quality and technical
                                structure both matter.
                            </p>

                            <div class="contact-links">
                                <a href="mailto:hello@example.com">hello@example.com</a>
                                <a href="https://github.com/mhmdMediqo">github.com/mhmdMediqo</a>
                            </div>
                        </article>

                        <article class="contact-note reveal" style="--delay: 120ms">
                            <h3>Next personalization pass</h3>
                            <p>
                                Replace placeholder contact info, add real project screenshots or case studies,
                                and connect this page to deployment once PHP and Composer are available on the host.
                            </p>
                        </article>
                    </div>
                </div>
            </section>
        </main>

        <footer class="footer">
            <div class="footer-inner">
                <span>Mohammad Aghajani</span>
                <span>Flutter • Laravel • Tech Lead</span>
            </div>
        </footer>
    </div>

    <script type="module">
        import * as THREE from "https://unpkg.com/three@0.176.0/build/three.module.js";

        const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

        if (!reduceMotion) {
            const canvas = document.getElementById("scene");
            const renderer = new THREE.WebGLRenderer({
                canvas,
                alpha: true,
                antialias: true,
            });

            renderer.setPixelRatio(Math.min(window.devicePixelRatio, 1.8));
            renderer.setSize(window.innerWidth, window.innerHeight);

            const scene = new THREE.Scene();
            const camera = new THREE.PerspectiveCamera(52, window.innerWidth / window.innerHeight, 0.1, 100);
            camera.position.set(0, 0, 10);

            const group = new THREE.Group();
            scene.add(group);

            const ambient = new THREE.AmbientLight(0xd6f1ff, 0.7);
            scene.add(ambient);

            const key = new THREE.PointLight(0x67f5c7, 2.8, 50);
            key.position.set(2, 3, 8);
            scene.add(key);

            const fill = new THREE.PointLight(0x5bb8ff, 2.5, 45);
            fill.position.set(-4, -2, 7);
            scene.add(fill);

            const warm = new THREE.PointLight(0xff9c6b, 1.4, 35);
            warm.position.set(3, -4, 6);
            scene.add(warm);

            const wireMaterial = new THREE.MeshPhysicalMaterial({
                color: 0x7fcbff,
                metalness: 0.5,
                roughness: 0.18,
                transmission: 0.1,
                transparent: true,
                opacity: 0.8,
                wireframe: true,
            });

            const solidMaterial = new THREE.MeshPhysicalMaterial({
                color: 0x67f5c7,
                metalness: 0.45,
                roughness: 0.22,
                emissive: 0x0a1820,
            });

            const torus = new THREE.Mesh(
                new THREE.TorusKnotGeometry(1.5, 0.34, 210, 24),
                wireMaterial
            );
            torus.position.set(-2.8, 0.9, 0);
            group.add(torus);

            const icosa = new THREE.Mesh(
                new THREE.IcosahedronGeometry(1.3, 0),
                solidMaterial
            );
            icosa.position.set(2.6, -1.25, -1.2);
            group.add(icosa);

            const ring = new THREE.Mesh(
                new THREE.TorusGeometry(2.8, 0.04, 16, 220),
                new THREE.MeshBasicMaterial({
                    color: 0x5bb8ff,
                    transparent: true,
                    opacity: 0.35,
                })
            );
            ring.rotation.x = Math.PI / 1.65;
            ring.position.set(0.7, 0.2, -2.5);
            group.add(ring);

            const particlesGeometry = new THREE.BufferGeometry();
            const particleCount = 1400;
            const positions = new Float32Array(particleCount * 3);

            for (let i = 0; i < particleCount; i += 1) {
                const radius = 8 + Math.random() * 10;
                const theta = Math.random() * Math.PI * 2;
                const phi = Math.acos(2 * Math.random() - 1);
                positions[i * 3] = radius * Math.sin(phi) * Math.cos(theta);
                positions[i * 3 + 1] = radius * Math.sin(phi) * Math.sin(theta) * 0.5;
                positions[i * 3 + 2] = (Math.random() - 0.5) * 14;
            }

            particlesGeometry.setAttribute("position", new THREE.BufferAttribute(positions, 3));

            const particlesMaterial = new THREE.PointsMaterial({
                color: 0xd8ebff,
                size: 0.03,
                transparent: true,
                opacity: 0.85,
            });

            const particles = new THREE.Points(particlesGeometry, particlesMaterial);
            scene.add(particles);

            const pointer = { x: 0, y: 0 };

            window.addEventListener("pointermove", (event) => {
                pointer.x = (event.clientX / window.innerWidth) * 2 - 1;
                pointer.y = (event.clientY / window.innerHeight) * 2 - 1;
            });

            const clock = new THREE.Clock();

            const render = () => {
                const elapsed = clock.getElapsedTime();
                const scrollY = window.scrollY || 0;
                const scrollRatio = scrollY / Math.max(document.body.scrollHeight - window.innerHeight, 1);

                torus.rotation.x = elapsed * 0.35;
                torus.rotation.y = elapsed * 0.55 + scrollRatio * 1.4;

                icosa.rotation.x = elapsed * 0.45;
                icosa.rotation.y = elapsed * 0.25 + scrollRatio * 0.8;
                icosa.position.y = -1.25 + Math.sin(elapsed * 0.9) * 0.28;

                ring.rotation.z = elapsed * 0.12;
                ring.position.x = 0.7 + Math.sin(elapsed * 0.6) * 0.25;

                particles.rotation.y = elapsed * 0.025;
                particles.rotation.x = elapsed * 0.012;

                group.rotation.y += (pointer.x * 0.45 - group.rotation.y) * 0.03;
                group.rotation.x += ((-pointer.y * 0.28) - group.rotation.x) * 0.03;
                group.position.y = -scrollRatio * 1.8;
                camera.position.z = 10 - scrollRatio * 1.2;

                renderer.render(scene, camera);
                window.requestAnimationFrame(render);
            };

            render();

            window.addEventListener("resize", () => {
                camera.aspect = window.innerWidth / window.innerHeight;
                camera.updateProjectionMatrix();
                renderer.setSize(window.innerWidth, window.innerHeight);
                renderer.setPixelRatio(Math.min(window.devicePixelRatio, 1.8));
            });
        }

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("is-visible");
                }
            });
        }, { threshold: 0.16 });

        document.querySelectorAll(".reveal").forEach((node) => observer.observe(node));
    </script>
</body>
</html>
