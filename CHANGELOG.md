# Release Notes for Payment Express (Windcave) for Craft Commerce

## 1.3.2.1 - 2020-04-24
### Fixed
- Minor fix for composer

## 1.3.2 - 2020-04-24
### Fixed
- Minor fix for composer

## 1.3.1 - 2020-04-23
### Fixed
- Fix for omnipay/paymentexpress version

## 1.3.0.1 - 2020-04-23
### Fixed
- Fix for omnipay/paymentexpress version

## 1.3.0 - 2020-04-23
### Changed
- Support for Commerce both ^2.2.0 and ^3.0.0. CMS requirement is now 3.1.5

## 1.2.0 - 2019-12-09
### Fixed
- Username and password can now be environment variables.

## 1.1.6 - 2019-07-28
### Fixed
- Test mode is now passed through to gateway

## 1.1.5 - 2019-07-23
### Fixed
- Added a custom response class to handle isProcessing()

## 1.1.4 - 2019-02-05
### Removed
- Craft Plugin Store Editions support as it's not required.

## 1.1.3 - 2019-02-02
### Added
- Added additional documentation to assist with testing payments.
- Added a warning on the gateway settings form to ensure the right payment type is selected.

## 1.1.2 - 2019-02-02
### Fixed
- Fixed an issue with the widget when no orders had been placed.
- Fixed template rendering issue

## 1.1.1 - 2019-02-01
### Fixed
- Fixed an issue with the plugin handle which was causing install issues.

## 1.1.0 - 2019-02-01
### Added
- Added Gateway overview widget.
> {tip} Add the new widget on your dashboard. 
By default it looks for a gateway with the handle "paymentExpress" but can be changed on the widgets settings.

## 1.0.1 - 2019-02-01
### Added
- Added Craft Plugin Store support.

## 1.0 - 2019-02-01
### Added
- Initial release.
