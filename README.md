# mhmd-portfolio

Single-page Laravel portfolio for Mohammad Aghajani with a 3D technology-driven visual direction.

## Stack

- Laravel 12
- Blade single-page view
- Three.js via ESM CDN for the animated 3D background
- Pure CSS for layout, glow, grids, reveal choreography, and responsive behavior
- GitHub Actions for CI and deployment
- GitHub Pages for free preview hosting

## Local setup

1. Install PHP 8.2+ and Composer on your machine.
2. Run `composer install`.
3. Copy `.env.example` to `.env`.
4. Run `php artisan key:generate`.
5. Start the app with `php artisan serve`.

## GitHub workflow

- Day-to-day development targets the `develop` branch through pull requests.
- `.github/workflows/laravel-ci.yml` runs lightweight Laravel-oriented checks on pushes and pull requests for `develop`.
- `.github/workflows/deploy-pages.yml` exports the Blade portfolio view to static HTML and publishes it to GitHub Pages on each push to `develop`.
- The export script lives at `scripts/export-static.sh`.
- After switching the repository to public and enabling Pages from GitHub Actions, a fresh merge into `develop` will trigger a new deployment.
- A branch-based fallback also exists in `docs/` on `develop` for cases where GitHub Actions does not run.

## Preview URL

After the Pages workflow succeeds and GitHub Pages is enabled for the repository, the site should be available at:

- `https://mhmdmediqo.github.io/mhmd-portfolio/`

## Notes

- This environment did not include PHP or Composer, so the Laravel app could not be executed here.
- The online preview is static because this portfolio page does not currently require server-side Laravel behavior.
- Update the placeholder email and any project descriptions with your real details before sharing the final portfolio.
