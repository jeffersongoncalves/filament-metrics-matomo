# Changelog

All notable changes to `filament-metrics-matomo` will be documented in this file.

## 3.2.0 - 2026-09-23

### Changed

- **Built on `filament-analytics-core`:** the plugin now extends `AbstractAnalyticsPlugin` and depends on `jeffersongoncalves/filament-analytics-core` (matching major), like the other analytics plugins. `filament/spatie-laravel-settings-plugin` now comes in through that package. The plugin id, the `settingsPage()` API and the defaults are unchanged.
- On the 1.x branch of filament-cookie-consent and filament-metrics-matomo, the PHP requirement is now `^8.2`, which analytics-core already required.

### What's Changed

* ci: standardize tests workflow (3.x) by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-metrics-matomo/pull/24
* ci: standardize dependabot config by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-metrics-matomo/pull/18
* refactor: build on filament-analytics-core (3.x) by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-metrics-matomo/pull/27
* ci: standardize dependabot config by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-metrics-matomo/pull/28

**Full Changelog**: https://github.com/jeffersongoncalves/filament-metrics-matomo/compare/3.1.0...3.2.0

## 3.1.0 - 2026-09-23

### What's new

- **Translations:** 17 new locales (ar, az, de, es, fa, fr, hi, it, ja, nl, pl, pt, ru, tr, uk, uz, zh_CN). (#21)

Thanks to @Elvin-Qulizade (Elvin Qulizada) for the i18n initiative behind these translations — first contributed in jeffersongoncalves/filament-scanner-guard#2 and now rolled out across the Filament plugins. He is credited as co-author.

### What's Changed

* docs: add Buy Me a Coffee sponsor link by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-metrics-matomo/pull/1
* docs: standardize README section structure by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-metrics-matomo/pull/4
* chore: add GitHub Sponsors to FUNDING.yml by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-metrics-matomo/pull/7
* ci: standardize update-changelog workflow (3.x) by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-metrics-matomo/pull/12
* ci: standardize dependabot config by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-metrics-matomo/pull/13
* ci: standardize tests workflow (3.x) by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-metrics-matomo/pull/17
* feat(i18n): add translations (3.x) by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-metrics-matomo/pull/21

**Full Changelog**: https://github.com/jeffersongoncalves/filament-metrics-matomo/compare/v3.0.0...3.1.0

## [Unreleased]
