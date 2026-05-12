<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mohammad Aghajani | Flutter, Laravel, AI Orbit</title>
    <meta
        name="description"
        content="Interactive single-page portfolio for Mohammad Aghajani with a cursor-reactive orbit system focused on Flutter, Laravel, AI tools, and product-minded engineering."
    >
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Sora:wght@500;600;700;800&display=swap"
        rel="stylesheet"
    >
    <style>
        :root {
            --bg: #02040a;
            --bg-2: #091120;
            --panel: rgba(10, 16, 30, 0.74);
            --panel-strong: rgba(9, 15, 28, 0.92);
            --line: rgba(158, 201, 255, 0.14);
            --text: #f3f7ff;
            --muted: #94a7c5;
            --flutter: #4fb3ff;
            --laravel: #ff6b5b;
            --ai: #6cf0c2;
            --glow: rgba(79, 179, 255, 0.2);
            --max: 1220px;
            --radius: 28px;
            --hero-pad: clamp(3rem, 7vw, 6rem);
            --cursor-x: 50vw;
            --cursor-y: 50vh;
            --pointer-x: 0;
            --pointer-y: 0;
            --orbit-angle: 0deg;
            --panel-accent: var(--flutter);
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: "Manrope", sans-serif;
            color: var(--text);
            background:
                radial-gradient(circle at top, rgba(79, 179, 255, 0.16), transparent 24%),
                radial-gradient(circle at 82% 18%, rgba(108, 240, 194, 0.12), transparent 20%),
                radial-gradient(circle at 50% 100%, rgba(255, 107, 91, 0.11), transparent 22%),
                linear-gradient(180deg, #040814 0%, #050912 35%, #02050a 100%);
            overflow-x: hidden;
        }

        body::before,
        body::after {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 0;
        }

        body::before {
            background-image:
                radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.16) 0 1px, transparent 1px),
                radial-gradient(circle at 80% 10%, rgba(255, 255, 255, 0.18) 0 1px, transparent 1px),
                radial-gradient(circle at 66% 44%, rgba(255, 255, 255, 0.15) 0 1px, transparent 1px),
                radial-gradient(circle at 30% 80%, rgba(255, 255, 255, 0.14) 0 1px, transparent 1px),
                radial-gradient(circle at 92% 74%, rgba(255, 255, 255, 0.15) 0 1px, transparent 1px);
            background-size: 340px 340px, 420px 420px, 510px 510px, 620px 620px, 760px 760px;
            opacity: 0.48;
        }

        body::after {
            background:
                linear-gradient(rgba(255, 255, 255, 0.024) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.024) 1px, transparent 1px);
            background-size: 72px 72px;
            mask-image: radial-gradient(circle at center, black 20%, transparent 78%);
            opacity: 0.42;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        img {
            display: block;
            max-width: 100%;
        }

        button {
            font: inherit;
        }

        .cursor-glow {
            position: fixed;
            left: 0;
            top: 0;
            width: 22rem;
            height: 22rem;
            border-radius: 50%;
            background:
                radial-gradient(circle, rgba(108, 240, 194, 0.18), rgba(79, 179, 255, 0.1) 34%, transparent 72%);
            transform: translate3d(calc(var(--cursor-x) - 11rem), calc(var(--cursor-y) - 11rem), 0);
            pointer-events: none;
            mix-blend-mode: screen;
            z-index: 1;
            filter: blur(8px);
        }

        .site-shell {
            position: relative;
            z-index: 2;
        }

        .section-inner,
        .footer-inner {
            width: min(calc(100% - 2rem), var(--max));
            margin: 0 auto;
        }

        .hero {
            min-height: 100svh;
            padding: var(--hero-pad) 0 3rem;
            display: grid;
            align-items: center;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: minmax(0, 0.92fr) minmax(420px, 1.08fr);
            gap: clamp(2rem, 4vw, 4rem);
            align-items: center;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            color: var(--ai);
            text-transform: uppercase;
            letter-spacing: 0.2em;
            font-size: 0.78rem;
            font-weight: 800;
        }

        .eyebrow::before {
            content: "";
            width: 2.6rem;
            height: 1px;
            background: linear-gradient(90deg, var(--ai), transparent);
        }

        .hero-identity {
            display: inline-flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.4rem;
            width: fit-content;
            padding: 0.75rem 1rem 0.75rem 0.75rem;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(14px);
        }

        .hero-avatar {
            width: 4.8rem;
            aspect-ratio: 1;
            border-radius: 50%;
            display: grid;
            place-items: center;
            overflow: hidden;
            background:
                radial-gradient(circle at 50% 42%, rgba(255, 255, 255, 0.08), transparent 48%),
                linear-gradient(180deg, rgba(10, 17, 31, 0.94), rgba(4, 8, 14, 0.9));
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow:
                0 0 36px rgba(108, 240, 194, 0.14),
                0 0 28px rgba(79, 179, 255, 0.12);
        }

        .hero-avatar img {
            width: 84%;
            height: auto;
            filter: drop-shadow(0 14px 20px rgba(0, 0, 0, 0.24));
        }

        .hero-nameplate {
            display: grid;
            gap: 0.2rem;
        }

        .hero-nameplate strong {
            font-family: "Sora", sans-serif;
            font-size: 1.1rem;
            line-height: 1.1;
        }

        .hero-nameplate span {
            color: var(--muted);
            font-size: 0.92rem;
            line-height: 1.45;
        }

        .hero-copy h1 {
            margin: 1rem 0 1rem;
            font-family: "Sora", sans-serif;
            font-size: clamp(3.2rem, 8vw, 6.9rem);
            line-height: 0.96;
            letter-spacing: 0;
            max-width: 8.5ch;
        }

        .hero-copy p {
            margin: 0;
            max-width: 39rem;
            color: var(--muted);
            font-size: clamp(1rem, 1.25vw, 1.12rem);
            line-height: 1.86;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 2rem;
        }

        .button {
            min-height: 52px;
            padding: 0 1.2rem;
            display: inline-flex;
            align-items: center;
            gap: 0.7rem;
            border-radius: 999px;
            border: 1px solid transparent;
            font-weight: 800;
            transition: transform 180ms ease, border-color 180ms ease, background 180ms ease;
        }

        .button:hover,
        .button:focus-visible {
            transform: translateY(-2px);
        }

        .button-primary {
            color: #01131c;
            background: linear-gradient(135deg, var(--ai), #c2ffec);
            box-shadow: 0 18px 34px rgba(108, 240, 194, 0.14);
        }

        .button-secondary {
            border-color: rgba(255, 255, 255, 0.1);
            background: rgba(255, 255, 255, 0.03);
        }

        .button-dialog {
            position: relative;
            overflow: hidden;
        }

        .button-dialog::after {
            content: "";
            position: absolute;
            inset: auto -10% -140% auto;
            width: 7rem;
            height: 7rem;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.26), transparent 68%);
            opacity: 0.45;
            transition: transform 240ms ease;
        }

        .button-dialog:hover::after,
        .button-dialog:focus-visible::after {
            transform: translate(-10px, -10px) scale(1.06);
        }

        .hero-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.8rem;
            padding: 0;
            margin: 1.6rem 0 0;
            list-style: none;
        }

        .hero-tags li {
            padding: 0.72rem 0.95rem;
            border-radius: 999px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(255, 255, 255, 0.03);
            color: #d8e6ff;
            font-size: 0.92rem;
        }

        .orbit-lab {
            position: relative;
            min-height: 44rem;
        }

        .orbit-info {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            padding: 1.3rem 1.35rem;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            background: linear-gradient(180deg, rgba(9, 15, 28, 0.92), rgba(6, 10, 18, 0.82));
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.05);
            overflow: hidden;
        }

        .orbit-info::before {
            content: "";
            position: absolute;
            inset: 0 auto 0 0;
            width: 4px;
            background: linear-gradient(180deg, var(--panel-accent), transparent);
        }

        .orbit-info-shell {
            display: grid;
            gap: 0.9rem;
            opacity: 1;
            transform: translateY(0);
            transition: opacity 260ms ease, transform 260ms ease;
        }

        .orbit-info-shell.is-switching {
            opacity: 0;
            transform: translateY(10px);
        }

        .orbit-title-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .orbit-title-row h2 {
            margin: 0;
            font-family: "Sora", sans-serif;
            font-size: clamp(1.3rem, 2vw, 2rem);
        }

        .orbit-kicker {
            color: var(--panel-accent);
            text-transform: uppercase;
            letter-spacing: 0.18em;
            font-size: 0.74rem;
            font-weight: 800;
        }

        .orbit-description {
            margin: 0;
            color: var(--muted);
            line-height: 1.8;
            max-width: 50rem;
        }

        .orbit-points {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .orbit-points li {
            padding: 0.72rem 0.9rem;
            border-radius: 999px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(255, 255, 255, 0.03);
            color: #d9e8ff;
            font-size: 0.9rem;
        }

        .stage {
            position: absolute;
            inset: 12.5rem 0 0;
            border-radius: 30px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            background:
                radial-gradient(circle at 50% 45%, rgba(79, 179, 255, 0.08), transparent 18%),
                radial-gradient(circle at 50% 48%, rgba(108, 240, 194, 0.06), transparent 30%),
                linear-gradient(180deg, rgba(7, 10, 17, 0.88), rgba(4, 7, 14, 0.7));
            overflow: hidden;
            transform-style: preserve-3d;
            transform:
                perspective(1200px)
                rotateX(calc(var(--pointer-y) * -6deg))
                rotateY(calc(var(--pointer-x) * 8deg));
            transition: transform 180ms ease-out;
        }

        .stage::before,
        .stage::after {
            content: "";
            position: absolute;
            inset: 0;
            pointer-events: none;
        }

        .stage::before {
            background:
                radial-gradient(circle at 50% 50%, rgba(108, 240, 194, 0.08), transparent 26%),
                radial-gradient(circle at 50% 50%, rgba(79, 179, 255, 0.09), transparent 40%);
        }

        .stage::after {
            background-image:
                radial-gradient(circle, rgba(255, 255, 255, 0.18) 0 1px, transparent 1px),
                radial-gradient(circle, rgba(255, 255, 255, 0.12) 0 1px, transparent 1px);
            background-size: 120px 120px, 220px 220px;
            background-position: 0 0, 40px 70px;
            opacity: 0.35;
        }

        .orbit-grid {
            position: absolute;
            inset: 0;
            background:
                linear-gradient(rgba(255, 255, 255, 0.024) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.024) 1px, transparent 1px);
            background-size: 56px 56px;
            mask-image: radial-gradient(circle at center, black 32%, transparent 82%);
            opacity: 0.22;
        }

        .orbital-system {
            position: absolute;
            inset: 0;
            display: grid;
            place-items: center;
        }

        .orbit-rings {
            position: relative;
            width: min(32rem, 76%);
            aspect-ratio: 1;
            transform: rotate(var(--orbit-angle));
            transition: transform 720ms cubic-bezier(0.22, 1, 0.36, 1);
        }

        .orbit-ring,
        .orbit-ring-secondary {
            position: absolute;
            inset: 50%;
            border-radius: 50%;
            transform: translate(-50%, -50%);
        }

        .orbit-ring {
            width: 100%;
            height: 100%;
            border: 1px solid rgba(255, 255, 255, 0.12);
            box-shadow:
                0 0 60px rgba(79, 179, 255, 0.08),
                inset 0 0 30px rgba(79, 179, 255, 0.04);
        }

        .orbit-ring-secondary {
            width: 78%;
            height: 78%;
            border: 1px dashed rgba(255, 255, 255, 0.08);
        }

        .planet {
            --planet-accent: var(--flutter);
            position: absolute;
            left: 50%;
            top: 50%;
            width: 8.2rem;
            height: 8.2rem;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, 0.08);
            background:
                radial-gradient(circle at 35% 32%, rgba(255, 255, 255, 0.18), transparent 28%),
                linear-gradient(180deg, rgba(10, 16, 30, 0.96), rgba(5, 10, 18, 0.9));
            display: grid;
            place-items: center;
            transform: translate(-50%, -50%) translate(var(--planet-x), var(--planet-y));
            box-shadow: 0 0 46px color-mix(in srgb, var(--planet-accent) 20%, transparent);
            transition:
                transform 720ms cubic-bezier(0.22, 1, 0.36, 1),
                box-shadow 260ms ease,
                border-color 260ms ease,
                background 260ms ease;
            cursor: pointer;
        }

        .planet:hover,
        .planet:focus-visible {
            transform: translate(-50%, -50%) translate(var(--planet-x), var(--planet-y)) scale(1.05);
        }

        .planet.is-active {
            border-color: color-mix(in srgb, var(--planet-accent) 60%, white 6%);
            box-shadow:
                0 0 0 8px color-mix(in srgb, var(--planet-accent) 16%, transparent),
                0 0 50px color-mix(in srgb, var(--planet-accent) 34%, transparent);
        }

        .planet-shell {
            display: grid;
            place-items: center;
            gap: 0.5rem;
            text-align: center;
        }

        .planet-icon {
            width: 2.8rem;
            height: 2.8rem;
            display: grid;
            place-items: center;
            color: var(--planet-accent);
        }

        .planet-label {
            font-size: 0.82rem;
            color: #d9e7ff;
            font-weight: 700;
            letter-spacing: 0.02em;
        }

        .planet-path {
            position: absolute;
            left: 50%;
            top: 50%;
            width: 1px;
            height: 1px;
            pointer-events: none;
        }

        .planet-path::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: calc(hypot(var(--planet-x), var(--planet-y)));
            height: 1px;
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.16), transparent);
            transform-origin: left center;
            transform: rotate(var(--planet-rotation));
            opacity: 0.25;
        }

        .planet[data-planet="flutter"] {
            --planet-accent: var(--flutter);
            --planet-x: 0rem;
            --planet-y: -15.2rem;
            --planet-rotation: -90deg;
        }

        .planet[data-planet="laravel"] {
            --planet-accent: var(--laravel);
            --planet-x: 13rem;
            --planet-y: 7.6rem;
            --planet-rotation: 30deg;
        }

        .planet[data-planet="ai"] {
            --planet-accent: var(--ai);
            --planet-x: -13rem;
            --planet-y: 7.6rem;
            --planet-rotation: 150deg;
        }

        .status-dock {
            position: absolute;
            left: 1.15rem;
            bottom: 1.15rem;
            display: flex;
            flex-wrap: wrap;
            gap: 0.7rem;
            z-index: 3;
        }

        .status-pill {
            padding: 0.78rem 0.92rem;
            border-radius: 999px;
            background: rgba(7, 12, 21, 0.82);
            border: 1px solid rgba(255, 255, 255, 0.08);
            color: #dbe8ff;
            font-size: 0.88rem;
            backdrop-filter: blur(12px);
        }

        .reveal {
            opacity: 0;
            transform: translateY(34px);
            transition: opacity 720ms ease, transform 720ms ease;
            transition-delay: var(--delay, 0ms);
        }

        .reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        section.band {
            padding: clamp(3.3rem, 8vw, 6rem) 0;
        }

        .section-heading {
            display: grid;
            gap: 0.9rem;
            margin-bottom: 2rem;
        }

        .section-heading h2 {
            margin: 0;
            font-family: "Sora", sans-serif;
            font-size: clamp(1.9rem, 4vw, 3.3rem);
            line-height: 1.03;
        }

        .section-heading p {
            margin: 0;
            max-width: 42rem;
            color: var(--muted);
            line-height: 1.8;
        }

        .grid-two {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 1.2rem;
        }

        .note-panel {
            padding: 1.3rem;
            border-radius: 26px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            background: linear-gradient(180deg, rgba(9, 15, 28, 0.82), rgba(4, 8, 14, 0.76));
        }

        .note-panel h3 {
            margin: 0 0 0.8rem;
            font-family: "Sora", sans-serif;
            font-size: 1.12rem;
        }

        .note-panel p {
            margin: 0;
            color: var(--muted);
            line-height: 1.8;
        }

        .tool-row {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            padding: 0;
            margin: 1.15rem 0 0;
            list-style: none;
        }

        .tool-row li {
            padding: 0.78rem 0.94rem;
            border-radius: 999px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(255, 255, 255, 0.03);
            color: #e4efff;
            font-size: 0.9rem;
        }

        .timeline-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 1rem;
        }

        .timeline-panel {
            padding: 1.25rem;
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            background: linear-gradient(180deg, rgba(8, 13, 24, 0.88), rgba(4, 8, 14, 0.7));
        }

        .timeline-panel strong {
            display: block;
            margin-bottom: 0.65rem;
            color: #f4f8ff;
        }

        .timeline-panel p {
            margin: 0;
            color: var(--muted);
            line-height: 1.75;
        }

        .experience-shell {
            position: relative;
            display: grid;
            gap: 1.1rem;
            padding-left: 2.6rem;
        }

        .experience-shell::before {
            content: "";
            position: absolute;
            left: 0.8rem;
            top: 0.35rem;
            bottom: 0.35rem;
            width: 1px;
            background: linear-gradient(180deg, rgba(108, 240, 194, 0.5), rgba(79, 179, 255, 0.08));
        }

        .experience-item {
            position: relative;
            padding-left: 0.4rem;
        }

        .experience-item::before {
            content: "";
            position: absolute;
            left: -1.8rem;
            top: 1.35rem;
            width: 0.9rem;
            height: 0.9rem;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--ai), var(--flutter));
            box-shadow: 0 0 0 6px rgba(108, 240, 194, 0.1);
        }

        .experience-card {
            position: relative;
            display: grid;
            gap: 0.9rem;
            padding: 1.25rem 1.2rem 1.15rem;
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            background:
                linear-gradient(180deg, rgba(9, 15, 28, 0.88), rgba(5, 9, 16, 0.84));
            box-shadow:
                0 18px 44px rgba(0, 0, 0, 0.18),
                inset 0 1px 0 rgba(255, 255, 255, 0.04);
            transform: translateY(0);
            transition: transform 220ms ease, border-color 220ms ease, box-shadow 220ms ease;
        }

        .experience-card:hover,
        .experience-card:focus-within {
            transform: translateY(-4px);
            border-color: rgba(108, 240, 194, 0.28);
            box-shadow:
                0 24px 52px rgba(0, 0, 0, 0.26),
                0 0 0 1px rgba(108, 240, 194, 0.08);
        }

        .experience-card.is-newest::after {
            content: "Newest";
            position: absolute;
            top: 1rem;
            right: 1rem;
            padding: 0.45rem 0.72rem;
            border-radius: 999px;
            background: rgba(108, 240, 194, 0.12);
            border: 1px solid rgba(108, 240, 194, 0.22);
            color: var(--ai);
            font-size: 0.76rem;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .experience-head {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 1rem;
            padding-right: 4.8rem;
        }

        .experience-title {
            display: grid;
            gap: 0.32rem;
        }

        .experience-title h3 {
            margin: 0;
            font-family: "Sora", sans-serif;
            font-size: 1.12rem;
            line-height: 1.35;
        }

        .experience-company {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: #dce9ff;
            font-size: 0.94rem;
            font-weight: 700;
        }

        .experience-company a {
            color: var(--ai);
        }

        .experience-type {
            width: fit-content;
            padding: 0.48rem 0.72rem;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            color: #dce8ff;
            font-size: 0.8rem;
        }

        .experience-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 0.7rem;
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .experience-meta li {
            padding: 0.58rem 0.76rem;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            color: #dce8ff;
            font-size: 0.84rem;
        }

        .experience-card p {
            margin: 0;
            color: var(--muted);
            line-height: 1.8;
        }

        .experience-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.7rem;
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .experience-tags li {
            padding: 0.62rem 0.84rem;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            color: #edf5ff;
            font-size: 0.82rem;
            transition: transform 180ms ease, border-color 180ms ease, background 180ms ease;
        }

        .experience-card:hover .experience-tags li {
            border-color: rgba(79, 179, 255, 0.22);
        }

        .dialog-backdrop {
            position: fixed;
            inset: 0;
            display: grid;
            place-items: center;
            padding: 1.2rem;
            background: rgba(2, 6, 12, 0.66);
            backdrop-filter: blur(18px);
            opacity: 0;
            visibility: hidden;
            transition: opacity 220ms ease, visibility 220ms ease;
            z-index: 40;
        }

        .dialog-backdrop.is-open {
            opacity: 1;
            visibility: visible;
        }

        .contact-dialog {
            width: min(100%, 31rem);
            padding: 1.35rem;
            border-radius: 28px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            background: linear-gradient(180deg, rgba(9, 15, 28, 0.96), rgba(4, 8, 14, 0.92));
            box-shadow: 0 24px 80px rgba(0, 0, 0, 0.42);
            transform: translateY(18px) scale(0.98);
            transition: transform 220ms ease;
        }

        .dialog-backdrop.is-open .contact-dialog {
            transform: translateY(0) scale(1);
        }

        .dialog-head {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1.1rem;
        }

        .dialog-head h3 {
            margin: 0;
            font-family: "Sora", sans-serif;
            font-size: 1.22rem;
        }

        .dialog-head p {
            margin: 0.45rem 0 0;
            color: var(--muted);
            line-height: 1.75;
            max-width: 24rem;
        }

        .dialog-close {
            width: 2.6rem;
            height: 2.6rem;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(255, 255, 255, 0.03);
            color: #e6efff;
            cursor: pointer;
        }

        .dialog-options {
            display: grid;
            gap: 0.85rem;
        }

        .contact-option {
            display: grid;
            gap: 0.45rem;
            padding: 1rem 1.05rem;
            border-radius: 22px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(255, 255, 255, 0.03);
            transition: transform 180ms ease, border-color 180ms ease, background 180ms ease;
        }

        .contact-option:hover,
        .contact-option:focus-visible {
            transform: translateY(-2px);
            border-color: rgba(108, 240, 194, 0.38);
            background: rgba(255, 255, 255, 0.05);
        }

        .contact-option strong {
            font-family: "Sora", sans-serif;
            font-size: 1rem;
        }

        .contact-option span {
            color: var(--muted);
            line-height: 1.65;
        }

        .footer {
            padding: 1.5rem 0 2.4rem;
            color: var(--muted);
        }

        .footer-inner {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding-top: 1.25rem;
            font-size: 0.94rem;
        }

        @media (max-width: 1100px) {
            .hero-grid,
            .grid-two,
            .timeline-grid {
                grid-template-columns: 1fr;
            }

            .orbit-lab {
                min-height: 48rem;
            }
        }

        @media (max-width: 820px) {
            .orbit-info {
                position: static;
                margin-bottom: 1rem;
            }

            .stage {
                position: relative;
                inset: auto;
                min-height: 35rem;
            }

            .orbit-lab {
                min-height: auto;
            }

            .experience-shell {
                padding-left: 1.8rem;
            }

            .experience-shell::before {
                left: 0.45rem;
            }

            .experience-item::before {
                left: -1.08rem;
            }

            .experience-head {
                padding-right: 0;
            }

            .orbit-rings {
                width: min(24rem, 92%);
            }

            .planet {
                width: 6.9rem;
                height: 6.9rem;
            }

            .planet[data-planet="flutter"] {
                --planet-y: -11.4rem;
            }

            .planet[data-planet="laravel"] {
                --planet-x: 9.2rem;
                --planet-y: 5.4rem;
            }

            .planet[data-planet="ai"] {
                --planet-x: -9.2rem;
                --planet-y: 5.4rem;
            }

        }

        @media (max-width: 560px) {
            .hero-identity {
                width: 100%;
                align-items: center;
                border-radius: 28px;
            }

            .hero-avatar {
                width: 4.2rem;
            }

            .hero-nameplate span {
                font-size: 0.88rem;
            }

            .hero-copy h1 {
                max-width: 10ch;
            }

            .experience-card.is-newest::after {
                position: static;
                width: fit-content;
                margin-bottom: 0.1rem;
            }

            .experience-head {
                display: grid;
            }

            .planet-label {
                font-size: 0.72rem;
            }

            .planet-icon {
                width: 2.3rem;
                height: 2.3rem;
            }

            .status-dock {
                position: static;
                padding: 0 1rem 1rem;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            html {
                scroll-behavior: auto;
            }

            .cursor-glow,
            .stage,
            .orbit-rings,
            .planet,
            .button,
            .reveal,
            .orbit-info-shell {
                transition: none !important;
                animation: none !important;
                transform: none !important;
            }

            .reveal {
                opacity: 1 !important;
            }
        }
    </style>
</head>
<body>
    <div class="cursor-glow" aria-hidden="true"></div>

    <div class="site-shell">
        <main id="home">
            <section class="hero">
                <div class="section-inner hero-grid">
                    <div class="hero-copy reveal">
                        <div class="hero-identity" aria-label="Mohammad Aghajani intro">
                            <div class="hero-avatar">
                                <img data-avatar-image alt="Cartoon portrait of Mohammad Aghajani">
                            </div>
                            <div class="hero-nameplate">
                                <strong>Mohammad Aghajani</strong>
                                <span>Flutter engineer, Laravel builder, and AI-native product thinker</span>
                            </div>
                        </div>

                        <span class="eyebrow">Personal Portfolio</span>
                        <h1>Senior Flutter and Laravel engineer focused on professional product delivery.</h1>
                        <p>
                            I build products with the same standards I expect from serious teams: commitment,
                            punctual delivery, clean execution, and organized technical work. My focus is on Flutter,
                            Laravel, vibe coding workflows, and delivery that feels professional from first contact
                            to final handoff.
                        </p>

                        <div class="hero-actions">
                            <button class="button button-primary button-dialog" type="button" data-open-contact-dialog>Start a conversation</button>
                            <a class="button button-secondary" href="#experience">Review experience</a>
                        </div>

                        <ul class="hero-tags">
                            <li>Flutter</li>
                            <li>Laravel</li>
                            <li>Vibe coding</li>
                            <li>Senior delivery</li>
                            <li>Product discipline</li>
                        </ul>
                    </div>

                    <div class="orbit-lab reveal" id="orbit">
                        <article class="orbit-info" id="orbitInfo" style="--panel-accent: var(--flutter);">
                            <div class="orbit-info-shell" id="orbitInfoShell">
                                <span class="orbit-kicker" id="orbitKicker">Flutter Expertise</span>
                                <div class="orbit-title-row">
                                    <h2 id="orbitTitle">Flutter is where I build polished cross-platform products.</h2>
                                </div>
                                <p class="orbit-description" id="orbitDescription">
                                    I use Flutter for responsive UI, scalable structure, and production-minded mobile and web experiences that stay maintainable as the product grows.
                                </p>
                                <ul class="orbit-points" id="orbitPoints">
                                    <li>Responsive UI</li>
                                    <li>Scalable widgets</li>
                                    <li>Architecture</li>
                                    <li>Performance</li>
                                </ul>
                            </div>
                        </article>

                        <div class="stage" id="interactiveStage">
                            <div class="orbit-grid" aria-hidden="true"></div>
                            <div class="orbital-system">
                                <div class="orbit-rings" id="orbitRings">
                                    <div class="orbit-ring"></div>
                                    <div class="orbit-ring-secondary"></div>

                                    <span class="planet-path" style="--planet-x: 0rem; --planet-y: -15.2rem; --planet-rotation: -90deg;"></span>
                                    <button class="planet is-active" data-planet="flutter" aria-label="Show Flutter details">
                                        <span class="planet-shell">
                                            <span class="planet-icon" aria-hidden="true">
                                                <svg viewBox="0 0 100 100" fill="none">
                                                    <path d="M60 8 18 50l13 13L86 8H60Z" fill="currentColor"/>
                                                    <path d="m45 77 15 15h26L58 64 45 77Z" fill="currentColor"/>
                                                    <path d="M31 64 45 50h26L58 37H45L18 64l13 13Z" fill="currentColor" opacity=".82"/>
                                                </svg>
                                            </span>
                                            <span class="planet-label">Flutter</span>
                                        </span>
                                    </button>

                                    <span class="planet-path" style="--planet-x: 13rem; --planet-y: 7.6rem; --planet-rotation: 30deg;"></span>
                                    <button class="planet" data-planet="laravel" aria-label="Show Laravel details">
                                        <span class="planet-shell">
                                            <span class="planet-icon" aria-hidden="true">
                                                <svg viewBox="0 0 100 100" fill="none">
                                                    <path d="m17 55 16-28 17 9-16 28-17-9Zm18-31 16-9 16 9-16 9-16-9Zm18 42 16-28 16 9-16 28-16-9Z" fill="currentColor"/>
                                                    <path d="m34 67 17 9v18L34 85V67Zm18 9 17-9v18l-17 9V76Z" fill="currentColor" opacity=".85"/>
                                                </svg>
                                            </span>
                                            <span class="planet-label">Laravel</span>
                                        </span>
                                    </button>

                                    <span class="planet-path" style="--planet-x: -13rem; --planet-y: 7.6rem; --planet-rotation: 150deg;"></span>
                                    <button class="planet" data-planet="ai" aria-label="Show vibe coding details">
                                        <span class="planet-shell">
                                            <span class="planet-icon" aria-hidden="true">
                                                <svg viewBox="0 0 100 100" fill="none">
                                                    <path d="M50 14c8 0 14 6 14 14v4c12 3 20 13 20 25 0 16-13 29-29 29H45C29 86 16 73 16 57c0-12 8-22 20-25v-4c0-8 6-14 14-14Z" stroke="currentColor" stroke-width="8"/>
                                                    <path d="M36 57h28M50 28v44M28 42l16 15 28-23" stroke="currentColor" stroke-width="8" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </span>
                                            <span class="planet-label">Vibe Coding</span>
                                        </span>
                                    </button>
                                </div>
                            </div>

                            <div class="status-dock">
                                <span class="status-pill">Move the cursor to tilt the skills orbit</span>
                                <span class="status-pill">Click each planet to switch focus</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="band" id="tooling">
                <div class="section-inner">
                    <div class="section-heading reveal">
                        <span class="eyebrow">Skills</span>
                        <h2>Core strengths across Flutter, Laravel, and modern high-speed delivery workflows.</h2>
                        <p>
                            I work best on products that need strong frontend execution, dependable backend structure,
                            and a delivery flow that stays clean under real deadlines.
                        </p>
                    </div>

                    <div class="grid-two">
                        <article class="note-panel reveal">
                            <h3>Engineering stack</h3>
                            <p>
                                My strongest execution layer is Flutter and Laravel: product UI, API integration,
                                scalable structure, performance, and reliable end-to-end implementation.
                            </p>
                            <ul class="tool-row">
                                <li>Flutter</li>
                                <li>Laravel</li>
                                <li>Blade</li>
                                <li>REST APIs</li>
                                <li>API integration</li>
                                <li>Responsive UI</li>
                            </ul>
                        </article>

                        <article class="note-panel reveal" style="--delay: 120ms">
                            <h3>Execution workflow</h3>
                            <p>
                                I use vibe coding and AI-assisted implementation to speed up research, prototyping,
                                refactoring, and iteration while keeping the final output maintainable and production-ready.
                            </p>
                            <ul class="tool-row">
                                <li>Vibe coding</li>
                                <li>Code review</li>
                                <li>AI-assisted implementation</li>
                                <li>Faster iteration</li>
                                <li>Cleaner handoff</li>
                            </ul>
                        </article>
                    </div>
                </div>
            </section>

            <section class="band" id="experience">
                <div class="section-inner">
                    <div class="section-heading reveal">
                        <span class="eyebrow">Experience</span>
                        <h2>Experience shaped by shipping products, leading delivery, and keeping execution organized.</h2>
                        <p>
                            I value commitment, punctuality, professional discipline, and clean delivery. The experience
                            below is sorted from newest to oldest and focuses on the work that matters most on a fast-scanning resume site.
                        </p>
                    </div>

                    <div class="experience-shell">
                        <article class="experience-item reveal">
                            <div class="experience-card is-newest">
                                <div class="experience-head">
                                    <div class="experience-title">
                                        <h3>Senior Full-Stack Developer / Full-Stack Developer</h3>
                                        <div class="experience-company">Searchha <a href="https://searchha.com" target="_blank" rel="noreferrer">searchha.com</a></div>
                                    </div>
                                    <span class="experience-type">Project-based</span>
                                </div>
                                <ul class="experience-meta">
                                    <li>Recent project</li>
                                    <li>3 months</li>
                                    <li>Remote</li>
                                </ul>
                                <p>
                                    Designed and developed the complete Searchha website over roughly three months as a full-stack Laravel project. Built the backend and the Blade-based frontend, shaped the page structure and user flows, and optimized the site for fast, stable, and maintainable delivery. Based on the live site, Searchha serves a B2B trade network where partners can publish offers and requests across active product markets in Iran.
                                </p>
                                <ul class="experience-tags">
                                    <li>Laravel</li>
                                    <li>Blade</li>
                                    <li>Full-Stack Development</li>
                                    <li>Performance Optimization</li>
                                    <li>Responsive UI</li>
                                </ul>
                            </div>
                        </article>

                        <article class="experience-item reveal" style="--delay: 40ms">
                            <div class="experience-card">
                                <div class="experience-head">
                                    <div class="experience-title">
                                        <h3>Flutter Team Lead</h3>
                                        <div class="experience-company">TECHTiQ</div>
                                    </div>
                                    <span class="experience-type">Full-time</span>
                                </div>
                                <ul class="experience-meta">
                                    <li>Dec 2024 – Present</li>
                                    <li>Dubai, United Arab Emirates · Remote</li>
                                </ul>
                                <p>
                                    Leading the design and development of a healthcare web application in Flutter, with a focus on scalable architecture, mentoring, code review quality, performance, reliability, and collaboration with product, design, and QA.
                                </p>
                                <ul class="experience-tags">
                                    <li>Flutter</li>
                                    <li>Jira</li>
                                    <li>Architecture</li>
                                    <li>Code Reviews</li>
                                </ul>
                            </div>
                        </article>

                        <article class="experience-item reveal" style="--delay: 80ms">
                            <div class="experience-card">
                                <div class="experience-head">
                                    <div class="experience-title">
                                        <h3>Senior Flutter Developer</h3>
                                        <div class="experience-company">Jhogd</div>
                                    </div>
                                    <span class="experience-type">Freelance</span>
                                </div>
                                <ul class="experience-meta">
                                    <li>Jun 2024 – Oct 2024</li>
                                    <li>Netherlands · Remote</li>
                                </ul>
                                <p>
                                    Built a quiz application for Iranian users with strong emphasis on user experience, API integration, data flow management, testing, debugging, user feedback analysis, and performance optimization.
                                </p>
                                <ul class="experience-tags">
                                    <li>Flutter</li>
                                    <li>Git</li>
                                    <li>API Integration</li>
                                    <li>Performance Optimization</li>
                                </ul>
                            </div>
                        </article>

                        <article class="experience-item reveal" style="--delay: 120ms">
                            <div class="experience-card">
                                <div class="experience-head">
                                    <div class="experience-title">
                                        <h3>Senior Flutter Developer</h3>
                                        <div class="experience-company">Searchha</div>
                                    </div>
                                    <span class="experience-type">Freelance</span>
                                </div>
                                <ul class="experience-meta">
                                    <li>Aug 2024</li>
                                    <li>Tehran, Iran · Remote</li>
                                </ul>
                                <p>
                                    Designed and developed a B2B Flutter application focused on business connectivity, scalable architecture, API integration, user-centered usability, and performance monitoring.
                                </p>
                                <ul class="experience-tags">
                                    <li>Flutter</li>
                                    <li>API Integration</li>
                                    <li>Performance Monitoring</li>
                                    <li>Scalable Architecture</li>
                                </ul>
                            </div>
                        </article>

                        <article class="experience-item reveal" style="--delay: 160ms">
                            <div class="experience-card">
                                <div class="experience-head">
                                    <div class="experience-title">
                                        <h3>Senior Flutter Developer</h3>
                                        <div class="experience-company">Gamiran · Isfaf</div>
                                    </div>
                                    <span class="experience-type">Freelance</span>
                                </div>
                                <ul class="experience-meta">
                                    <li>Mar 2024 – Sep 2024</li>
                                    <li>Tehran Province, Iran · Remote</li>
                                </ul>
                                <p>
                                    Developed a fitness tracking application centered on health and wellness, with attention to tracking features, usability, and reliable cross-platform performance.
                                </p>
                                <ul class="experience-tags">
                                    <li>Flutter</li>
                                    <li>Cross-platform Development</li>
                                    <li>User Experience</li>
                                </ul>
                            </div>
                        </article>

                        <article class="experience-item reveal" style="--delay: 200ms">
                            <div class="experience-card">
                                <div class="experience-head">
                                    <div class="experience-title">
                                        <h3>Team Lead — Mobile Application Development</h3>
                                        <div class="experience-company">Besenior</div>
                                    </div>
                                    <span class="experience-type">Full-time</span>
                                </div>
                                <ul class="experience-meta">
                                    <li>Feb 2024 – Sep 2024</li>
                                    <li>Iran · Remote</li>
                                </ul>
                                <p>
                                    Led development of the LeagueTournament mobile application for Android and iOS, coordinating the team, maintaining clean architecture, and delivering a tournament-focused cross-platform product.
                                </p>
                                <ul class="experience-tags">
                                    <li>Flutter</li>
                                    <li>GitFlow</li>
                                    <li>Team Leadership</li>
                                    <li>Clean Architecture</li>
                                </ul>
                            </div>
                        </article>

                        <article class="experience-item reveal" style="--delay: 240ms">
                            <div class="experience-card">
                                <div class="experience-head">
                                    <div class="experience-title">
                                        <h3>Flutter Development Instructor</h3>
                                        <div class="experience-company">Besenior</div>
                                    </div>
                                    <span class="experience-type">Full-time</span>
                                </div>
                                <ul class="experience-meta">
                                    <li>Feb 2021 – Sep 2024</li>
                                </ul>
                                <p>
                                    Taught Flutter and mobile development concepts, mentored students, and shared practical experience in architecture, state management, and real-world app implementation.
                                </p>
                                <ul class="experience-tags">
                                    <li>Flutter</li>
                                    <li>Dart</li>
                                    <li>Get It</li>
                                    <li>Mentoring</li>
                                </ul>
                            </div>
                        </article>

                        <article class="experience-item reveal" style="--delay: 280ms">
                            <div class="experience-card">
                                <div class="experience-head">
                                    <div class="experience-title">
                                        <h3>Android Development Instructor</h3>
                                        <div class="experience-company">Self-employed</div>
                                    </div>
                                    <span class="experience-type">Self-employed</span>
                                </div>
                                <ul class="experience-meta">
                                    <li>Jan 2019 – Feb 2023</li>
                                    <li>Babol, Mazandaran, Iran</li>
                                </ul>
                                <p>
                                    Taught Android development, Android Jetpack, LiveData, and native architecture concepts with a focus on practical learning and real project understanding.
                                </p>
                                <ul class="experience-tags">
                                    <li>Android</li>
                                    <li>Android Jetpack</li>
                                    <li>LiveData</li>
                                    <li>Native Android</li>
                                </ul>
                            </div>
                        </article>

                        <article class="experience-item reveal" style="--delay: 320ms">
                            <div class="experience-card">
                                <div class="experience-head">
                                    <div class="experience-title">
                                        <h3>Flutter Developer</h3>
                                        <div class="experience-company">Besenior</div>
                                    </div>
                                    <span class="experience-type">Full-time</span>
                                </div>
                                <ul class="experience-meta">
                                    <li>Jun 2022 – Aug 2022</li>
                                    <li>Tehran Province, Iran</li>
                                </ul>
                                <p>
                                    Developed LeagueBS, a Flutter application for learning League of Legends, with focus on UI quality, clean architecture, and a smooth learning experience.
                                </p>
                                <ul class="experience-tags">
                                    <li>Flutter</li>
                                    <li>Dart</li>
                                    <li>Get It</li>
                                    <li>Clean Architecture</li>
                                </ul>
                            </div>
                        </article>

                        <article class="experience-item reveal" style="--delay: 360ms">
                            <div class="experience-card">
                                <div class="experience-head">
                                    <div class="experience-title">
                                        <h3>Flutter Developer</h3>
                                        <div class="experience-company">T Ah</div>
                                    </div>
                                    <span class="experience-type">Freelance</span>
                                </div>
                                <ul class="experience-meta">
                                    <li>Aug 2022 – Jun 2023</li>
                                    <li>Tehran Province, Iran · Remote</li>
                                </ul>
                                <p>
                                    Developed a transportation application for a logistics company to improve employee transportation workflows, team coordination, route planning, and real-time tracking.
                                </p>
                                <ul class="experience-tags">
                                    <li>Flutter</li>
                                    <li>Clean Architecture</li>
                                    <li>Real-time Tracking</li>
                                </ul>
                            </div>
                        </article>

                        <article class="experience-item reveal" style="--delay: 400ms">
                            <div class="experience-card">
                                <div class="experience-head">
                                    <div class="experience-title">
                                        <h3>Flutter Developer</h3>
                                        <div class="experience-company">Chitan Peitan</div>
                                    </div>
                                    <span class="experience-type">Contract</span>
                                </div>
                                <ul class="experience-meta">
                                    <li>Sep 2022 – Dec 2022</li>
                                    <li>Tehran Province, Iran · Remote</li>
                                </ul>
                                <p>
                                    Developed a Flutter application for Android, iOS, and Web using structured patterns and dependency management for a maintainable multi-platform codebase.
                                </p>
                                <ul class="experience-tags">
                                    <li>Flutter</li>
                                    <li>Git</li>
                                    <li>Get It</li>
                                    <li>Bloc/Cubit</li>
                                    <li>Dio</li>
                                    <li>Repository Pattern</li>
                                </ul>
                            </div>
                        </article>

                        <article class="experience-item reveal" style="--delay: 440ms">
                            <div class="experience-card">
                                <div class="experience-head">
                                    <div class="experience-title">
                                        <h3>Flutter Developer</h3>
                                        <div class="experience-company">Mobin Khodro</div>
                                    </div>
                                    <span class="experience-type">Freelance</span>
                                </div>
                                <ul class="experience-meta">
                                    <li>Apr 2022 – Jul 2022</li>
                                    <li>Tehran Province, Iran</li>
                                </ul>
                                <p>
                                    Developed an internal automation application focused on simplifying workflows and delivering a clean and efficient user experience.
                                </p>
                                <ul class="experience-tags">
                                    <li>Flutter</li>
                                    <li>Git</li>
                                    <li>Workflow Automation</li>
                                </ul>
                            </div>
                        </article>

                        <article class="experience-item reveal" style="--delay: 480ms">
                            <div class="experience-card">
                                <div class="experience-head">
                                    <div class="experience-title">
                                        <h3>Android Developer</h3>
                                        <div class="experience-company">Pte With Ash</div>
                                    </div>
                                    <span class="experience-type">Freelance</span>
                                </div>
                                <ul class="experience-meta">
                                    <li>Jan 2020 – Jul 2021</li>
                                    <li>Istanbul, Türkiye</li>
                                </ul>
                                <p>
                                    Developed a native Android application for English language learning, with focus on lesson structure, learning flow, and strong user interaction.
                                </p>
                                <ul class="experience-tags">
                                    <li>Android</li>
                                    <li>RxAndroid</li>
                                    <li>Native Development</li>
                                </ul>
                            </div>
                        </article>
                    </div>
                </div>
            </section>

            <section class="band" id="values">
                <div class="section-inner">
                    <div class="section-heading reveal">
                        <span class="eyebrow">Working Style</span>
                        <h2>Professional discipline matters as much as technical skill.</h2>
                        <p>
                            I care about commitment, punctuality, organized execution, and delivering work in a way that
                            teams can trust and build on comfortably.
                        </p>
                    </div>

                    <div class="timeline-grid">
                        <article class="timeline-panel reveal">
                            <strong>Commitment and punctuality</strong>
                            <p>
                                I take deadlines seriously and keep delivery predictable. Reliability is part of professional engineering, not a bonus.
                            </p>
                        </article>
                        <article class="timeline-panel reveal" style="--delay: 120ms">
                            <strong>Professional and organized work</strong>
                            <p>
                                I prefer clean structure, reviewable code, and orderly implementation that keeps future changes easier instead of harder.
                            </p>
                        </article>
                        <article class="timeline-panel reveal" style="--delay: 240ms">
                            <strong>Team lead experience</strong>
                            <p>
                                I have worked in team lead responsibilities where product quality, technical judgment, mentoring, and team momentum needed to stay aligned.
                            </p>
                        </article>
                    </div>
                </div>
            </section>

            <section class="band" id="contact">
                <div class="section-inner">
                    <div class="section-heading reveal">
                        <span class="eyebrow">Projects and Contact</span>
                        <h2>Available for serious product work, senior engineering roles, and new freelance projects.</h2>
                        <p>
                            For new projects, long-term roles, or product conversations, the fastest way to reach me
                            is through LinkedIn or email.
                        </p>
                    </div>

                    <div class="grid-two">
                        <article class="note-panel reveal">
                            <h3>Where I add the most value</h3>
                            <p>
                                Flutter products, Laravel platforms, responsive Blade experiences, AI-assisted workflows,
                                and senior engineering responsibilities where quality, discipline, and delivery all matter.
                            </p>
                        </article>
                        <article class="note-panel reveal" style="--delay: 120ms">
                            <h3>Experience and contact</h3>
                            <p>
                                For the most current project history and role timeline, LinkedIn is the best source.
                                For new work, you can reach me directly by LinkedIn message or email.
                            </p>
                            <ul class="tool-row">
                                <li><a href="https://www.linkedin.com/in/mohammad-aghajani-435830206" target="_blank" rel="noreferrer">LinkedIn</a></li>
                                <li><a href="mailto:mhm.aghajani435@gmail.com">mhm.aghajani435@gmail.com</a></li>
                            </ul>
                        </article>
                    </div>
                </div>
            </section>
        </main>

        <footer class="footer">
            <div class="footer-inner">
                <span>Mohammad Aghajani</span>
                <span>Senior Flutter Engineer • Laravel Full-Stack Developer</span>
            </div>
        </footer>
    </div>

    <div class="dialog-backdrop" id="contactDialog" aria-hidden="true">
        <div class="contact-dialog" role="dialog" aria-modal="true" aria-labelledby="contactDialogTitle">
            <div class="dialog-head">
                <div>
                    <h3 id="contactDialogTitle">Start a conversation</h3>
                    <p>Choose the easiest way to reach me for a project, role, or product collaboration.</p>
                </div>
                <button class="dialog-close" type="button" aria-label="Close contact options" data-close-contact-dialog>×</button>
            </div>

            <div class="dialog-options">
                <a class="contact-option" href="https://www.linkedin.com/in/mohammad-aghajani-435830206" target="_blank" rel="noreferrer">
                    <strong>LinkedIn</strong>
                    <span>Open my profile and send a direct message for project or hiring conversations.</span>
                </a>
                <a class="contact-option" href="mailto:mhm.aghajani435@gmail.com">
                    <strong>Email</strong>
                    <span>Send your brief, role details, or project scope to mhm.aghajani435@gmail.com.</span>
                </a>
            </div>
        </div>
    </div>

    <script>
        const avatarPath = window.location.hostname.endsWith("github.io")
            ? "assets/mhmd-cartoon-avatar.webp"
            : "/images/mhmd-cartoon-avatar.webp";

        document.querySelectorAll("[data-avatar-image]").forEach((image) => {
            image.src = avatarPath;
        });

        const planetData = {
            flutter: {
                kicker: "Flutter Expertise",
                title: "Flutter is where I build polished cross-platform products.",
                description: "I build Flutter interfaces with a strong focus on responsiveness, clean structure, maintainable widget composition, and product quality that feels professional in real use.",
                points: [
                    "Responsive mobile UI",
                    "Clean widget architecture",
                    "Performance-minded implementation",
                    "Product-focused polish",
                ],
                accent: "var(--flutter)",
                angle: "0deg",
            },
            laravel: {
                kicker: "Laravel Delivery",
                title: "Laravel is where structure, speed, and reliability meet.",
                description: "I use Laravel to build organized backend systems with clear logic, dependable data flow, scalable architecture, and delivery discipline that supports serious products.",
                points: [
                    "API and dashboard workflows",
                    "Validation and authorization",
                    "Service-oriented structure",
                    "Maintainable backend delivery",
                ],
                accent: "var(--laravel)",
                angle: "-120deg",
            },
            ai: {
                kicker: "Vibe Coding Workflow",
                title: "I use AI tools to move faster without lowering standards.",
                description: "I use practical AI-assisted development and vibe coding workflows to accelerate prototyping, implementation, and iteration while keeping the final output clean, maintainable, and production-ready.",
                points: [
                    "Vibe coding",
                    "Cursor",
                    "Codex",
                    "AI-assisted execution",
                ],
                accent: "var(--ai)",
                angle: "120deg",
            },
        };

        const stage = document.getElementById("interactiveStage");
        const orbitRings = document.getElementById("orbitRings");
        const orbitInfo = document.getElementById("orbitInfo");
        const orbitInfoShell = document.getElementById("orbitInfoShell");
        const orbitKicker = document.getElementById("orbitKicker");
        const orbitTitle = document.getElementById("orbitTitle");
        const orbitDescription = document.getElementById("orbitDescription");
        const orbitPoints = document.getElementById("orbitPoints");
        const cursorGlow = document.querySelector(".cursor-glow");
        const planets = [...document.querySelectorAll(".planet")];
        const contactDialog = document.getElementById("contactDialog");
        const openContactDialogButton = document.querySelector("[data-open-contact-dialog]");
        const closeContactDialogButton = document.querySelector("[data-close-contact-dialog]");

        let activePlanet = "flutter";
        let cursorX = window.innerWidth / 2;
        let cursorY = window.innerHeight / 2;
        let glowX = cursorX;
        let glowY = cursorY;

        const applyPlanet = (key) => {
            const next = planetData[key];
            if (!next) {
                return;
            }

            activePlanet = key;
            orbitInfoShell.classList.add("is-switching");

            window.setTimeout(() => {
                orbitKicker.textContent = next.kicker;
                orbitTitle.textContent = next.title;
                orbitDescription.textContent = next.description;
                orbitInfo.style.setProperty("--panel-accent", next.accent);
                orbitRings.style.setProperty("--orbit-angle", next.angle);

                orbitPoints.innerHTML = next.points
                    .map((item) => `<li>${item}</li>`)
                    .join("");

                planets.forEach((planet) => {
                    planet.classList.toggle("is-active", planet.dataset.planet === key);
                });

                orbitInfoShell.classList.remove("is-switching");
            }, 170);
        };

        planets.forEach((planet) => {
            planet.addEventListener("click", () => applyPlanet(planet.dataset.planet));
        });

        const updatePointer = (event) => {
            cursorX = event.clientX;
            cursorY = event.clientY;

            const bounds = stage.getBoundingClientRect();
            const relativeX = ((event.clientX - bounds.left) / bounds.width) * 2 - 1;
            const relativeY = ((event.clientY - bounds.top) / bounds.height) * 2 - 1;

            stage.style.setProperty("--pointer-x", relativeX.toFixed(3));
            stage.style.setProperty("--pointer-y", relativeY.toFixed(3));
        };

        stage.addEventListener("pointermove", updatePointer);
        stage.addEventListener("pointerleave", () => {
            stage.style.setProperty("--pointer-x", "0");
            stage.style.setProperty("--pointer-y", "0");
        });

        window.addEventListener("pointermove", (event) => {
            cursorX = event.clientX;
            cursorY = event.clientY;
        });

        const renderGlow = () => {
            glowX += (cursorX - glowX) * 0.12;
            glowY += (cursorY - glowY) * 0.12;
            cursorGlow.style.setProperty("--cursor-x", `${glowX}px`);
            cursorGlow.style.setProperty("--cursor-y", `${glowY}px`);
            window.requestAnimationFrame(renderGlow);
        };

        renderGlow();

        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("is-visible");
                }
            });
        }, { threshold: 0.14 });

        document.querySelectorAll(".reveal").forEach((node) => revealObserver.observe(node));

        const openContactDialog = () => {
            contactDialog.classList.add("is-open");
            contactDialog.setAttribute("aria-hidden", "false");
            document.body.style.overflow = "hidden";
        };

        const closeContactDialog = () => {
            contactDialog.classList.remove("is-open");
            contactDialog.setAttribute("aria-hidden", "true");
            document.body.style.overflow = "";
        };

        openContactDialogButton.addEventListener("click", openContactDialog);
        closeContactDialogButton.addEventListener("click", closeContactDialog);
        contactDialog.addEventListener("click", (event) => {
            if (event.target === contactDialog) {
                closeContactDialog();
            }
        });

        window.addEventListener("keydown", (event) => {
            if (event.key === "Escape" && contactDialog.classList.contains("is-open")) {
                closeContactDialog();
            }
        });

        applyPlanet(activePlanet);
    </script>
</body>
</html>
