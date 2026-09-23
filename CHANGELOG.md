# Changelog

All notable changes to `filament-metrics-matomo` will be documented in this file.

## 1.2.0 - 2026-09-23

### Changed

- **Built on `filament-analytics-core`:** the plugin now extends `AbstractAnalyticsPlugin` and depends on `jeffersongoncalves/filament-analytics-core` (matching major), like the other analytics plugins. `filament/spatie-laravel-settings-plugin` now comes in through that package. The plugin id, the `settingsPage()` API and the defaults are unchanged.
- On the 1.x branch of filament-cookie-consent and filament-metrics-matomo, the PHP requirement is now `^8.2`, which analytics-core already required.

### What's Changed

* ci: standardize tests workflow (1.x) by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-metrics-matomo/pull/22
* refactor: build on filament-analytics-core (1.x) by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-metrics-matomo/pull/25

**Full Changelog**: https://github.com/jeffersongoncalves/filament-metrics-matomo/compare/1.1.0...1.2.0

## 1.1.0 - 2026-09-23

### What's new

- **Translations:** 17 new locales (ar, az, de, es, fa, fr, hi, it, ja, nl, pl, pt, ru, tr, uk, uz, zh_CN). (#19)

Thanks to @Elvin-Qulizade (Elvin Qulizada) for the i18n initiative behind these translations — first contributed in jeffersongoncalves/filament-scanner-guard#2 and now rolled out across the Filament plugins. He is credited as co-author.

### What's Changed

* docs: add Buy Me a Coffee sponsor link by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-metrics-matomo/pull/2
* docs: standardize README section structure by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-metrics-matomo/pull/5
* chore: add Buy Me a Coffee to FUNDING.yml by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-metrics-matomo/pull/8
* ci: standardize update-changelog workflow (1.x) by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-metrics-matomo/pull/10
* chore(deps-dev): update larastan/larastan requirement from ^2.0 to ^3.12 in the composer-deps group by @dependabot[bot] in https://github.com/jeffersongoncalves/filament-metrics-matomo/pull/14
* ci: standardize tests workflow (1.x) by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-metrics-matomo/pull/15
* feat(i18n): add translations (1.x) by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-metrics-matomo/pull/19

### New Contributors

* @dependabot[bot] made their first contribution in https://github.com/jeffersongoncalves/filament-metrics-matomo/pull/14

**Full Changelog**: https://github.com/jeffersongoncalves/filament-metrics-matomo/compare/1.0.0...1.1.0

## [Unreleased]
