# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [3.0.0](https://github.com/ecphp/eu-login-bundle/compare/2.5.2...3.0.0)

### Merged

- chore(deps): Bump actions/checkout from 3 to 4 [`#56`](https://github.com/ecphp/eu-login-bundle/pull/56)
- chore(deps): Bump cachix/install-nix-action from 20 to 22 [`#54`](https://github.com/ecphp/eu-login-bundle/pull/54)
- chore(deps): Bump actions/checkout from 2.3.4 to 3.5.0 [`#51`](https://github.com/ecphp/eu-login-bundle/pull/51)
- chore(deps): Bump cachix/install-nix-action from 19 to 20 [`#49`](https://github.com/ecphp/eu-login-bundle/pull/49)
- chore(deps): Bump cachix/install-nix-action from 18 to 19 [`#47`](https://github.com/ecphp/eu-login-bundle/pull/47)
- chore(deps): Bump cachix/install-nix-action from 17 to 18 [`#45`](https://github.com/ecphp/eu-login-bundle/pull/45)
- Version 2 - Symfony 6 compatibility [`#40`](https://github.com/ecphp/eu-login-bundle/pull/40)

### Commits

- cs: autofix coding standards [`6293420`](https://github.com/ecphp/eu-login-bundle/commit/6293420ac6c57674a99837a256a0f3f95fd3778d)
- chore: update `infection` thresholds [`e965f98`](https://github.com/ecphp/eu-login-bundle/commit/e965f980b52468761b41afe258b20c28fbe633ca)
- chore: switch to `ecphp/cas-bundle` stable [`d7e735f`](https://github.com/ecphp/eu-login-bundle/commit/d7e735f4878f057c7e5db938166038a85164dd4c)
- ci: bump github actions and align with cas-bundle [`8cf4dc2`](https://github.com/ecphp/eu-login-bundle/commit/8cf4dc28eddcb1f4208165b9f618048618730e8c)
- chore: bump versions [`db613a2`](https://github.com/ecphp/eu-login-bundle/commit/db613a2f0bdf47578eaf9a865a1f78902628c72d)
- tests: rewrite [`0a3cad3`](https://github.com/ecphp/eu-login-bundle/commit/0a3cad3c9955fee41bc4fc9f8ac5933f59b81036)
- chore: cleanup config, remove XML stuff [`309dc3e`](https://github.com/ecphp/eu-login-bundle/commit/309dc3e107636d06907558740a56d0cc0bc3031d)
- chore: remove `ext-simplexml` requirement [`450648e`](https://github.com/ecphp/eu-login-bundle/commit/450648e516e572a9f23db352422b49a46928b6bd)
- chore: update license [`b49d985`](https://github.com/ecphp/eu-login-bundle/commit/b49d9859e1f808c691ba1f6ce1f3d8ed4ed0f38f)
- chore: get rid of scrutinizer [`ae822df`](https://github.com/ecphp/eu-login-bundle/commit/ae822df02e5dace167f7eaf8d361466370bff5d9)
- add `EcasAuthenticator` decorator [`0336e11`](https://github.com/ecphp/eu-login-bundle/commit/0336e111812c64a91e66c6ba9c7ecd310d60d1ad)
- refactor: remove deprecations [`f5137ad`](https://github.com/ecphp/eu-login-bundle/commit/f5137ad3ea69079e41d4b55a70d5e3cb3a04b623)
- fix: update User provider [`7459400`](https://github.com/ecphp/eu-login-bundle/commit/745940003b0ca41e7a464c6eee99a917abc591dd)
- fix: update services and decorators [`55c2c0f`](https://github.com/ecphp/eu-login-bundle/commit/55c2c0ff9d240f9ad2e561f2f9def721753b8130)
- feat: add `__toString` method to `EuLoginUser`. [`f14d7c7`](https://github.com/ecphp/eu-login-bundle/commit/f14d7c7840c96b5107b58ec6a762c2cfc2567043)
- nix: remove `-nts` prefix [`8d7d5a5`](https://github.com/ecphp/eu-login-bundle/commit/8d7d5a5790a1e6bd97d1e33b47108c636d45fa01)
- Work in progress [`74015e2`](https://github.com/ecphp/eu-login-bundle/commit/74015e26454d748fbb978ab9bb23e838a7355101)
- work in progress [`25f9d77`](https://github.com/ecphp/eu-login-bundle/commit/25f9d77ac0f2ebd73d3e0465bc8c606f946c4655)
- work in progress [`f1b3091`](https://github.com/ecphp/eu-login-bundle/commit/f1b30912a0c751c044c851b36d1787787a66d377)
- work in progress [`0dc18e9`](https://github.com/ecphp/eu-login-bundle/commit/0dc18e9ba8b9e5aa7dcf8c4f489507dbf23afd36)
- chore: Prettify codebase. [`2ed9a41`](https://github.com/ecphp/eu-login-bundle/commit/2ed9a414f13a32a62bd5c5295418442d079f909b)
- chore: Prettify codebase. [`110f9a9`](https://github.com/ecphp/eu-login-bundle/commit/110f9a968bf62666ed9d1023e4deee616197088a)
- fix: Update return types. [`9bf9133`](https://github.com/ecphp/eu-login-bundle/commit/9bf91331b2fda1e4e320ac0d9f579226a2f8e008)
- chore: Update composer.json. [`17f12de`](https://github.com/ecphp/eu-login-bundle/commit/17f12de628278aa5e6061939f97dd0b742c10f27)
- Do not update the tests right now. [`5905788`](https://github.com/ecphp/eu-login-bundle/commit/59057887641daadee2a7ec714d7252d4ab01ad59)
- chore: Update `composer.json`. [`6689c9b`](https://github.com/ecphp/eu-login-bundle/commit/6689c9b88d83d35531a79b810d020a13cd846375)
- Autofix minor things. [`9f4163f`](https://github.com/ecphp/eu-login-bundle/commit/9f4163f60b9eda40e93931781f061a82bcc5f250)
- Fix declared services. [`d3cfd3e`](https://github.com/ecphp/eu-login-bundle/commit/d3cfd3e2f1060c65b811a41b33e6b9a62539f413)
- Fix return types. [`661c6cd`](https://github.com/ecphp/eu-login-bundle/commit/661c6cd5008961dc1b0e94c9b80bfdd6f351c3c6)
- Version 3 - Use upcoming version of ecas. [`fdcde3f`](https://github.com/ecphp/eu-login-bundle/commit/fdcde3f064f65747713e22eadd220c38a70866e0)

## [2.5.2](https://github.com/ecphp/eu-login-bundle/compare/2.5.1...2.5.2) - 2022-12-15

### Commits

- docs: Update changelog. [`ecf16cc`](https://github.com/ecphp/eu-login-bundle/commit/ecf16cc089fc8a2a49b8d88fc091dfee50126d1a)
- fix: get rid of `XML` data handling in favor of `JSON`. [`c4edf50`](https://github.com/ecphp/eu-login-bundle/commit/c4edf50954b1b9df37e069a1b2b12ce33b548547)
- sa: add `psalm` baseline [`7d3bc41`](https://github.com/ecphp/eu-login-bundle/commit/7d3bc41b6be59d086171549a2ee917f1665fe6c8)
- chore: use `ecphp/ecas` ^2.4 [`8e15da5`](https://github.com/ecphp/eu-login-bundle/commit/8e15da518966f4122a770712e6d7ae9a55705fff)

## [2.5.1](https://github.com/ecphp/eu-login-bundle/compare/2.5.0...2.5.1) - 2022-12-15

### Commits

- docs: Update changelog. [`2c88f16`](https://github.com/ecphp/eu-login-bundle/commit/2c88f1695c090d4cb4678a59dd93b45055168b95)
- fix: update services and decorators [`9696d5c`](https://github.com/ecphp/eu-login-bundle/commit/9696d5ce8e71ff6fd2970275f11bcb5ddee554c2)
- feat: add `__toString` method to `EuLoginUser`. [`cb1616d`](https://github.com/ecphp/eu-login-bundle/commit/cb1616defe2a2dcc1b5de19aaf8418d3e1a96456)
- nix: remove `-nts` prefix [`292eb2c`](https://github.com/ecphp/eu-login-bundle/commit/292eb2c2be30a052c514bd0a9aedbc4250a721eb)

## [2.5.0](https://github.com/ecphp/eu-login-bundle/compare/2.4.2...2.5.0) - 2022-08-29

### Commits

- docs: Update CHANGELOG [`4658319`](https://github.com/ecphp/eu-login-bundle/commit/4658319eb179917c3f8ba8e43faf71cc17a7a469)
- chore: Prettify codebase. [`518f195`](https://github.com/ecphp/eu-login-bundle/commit/518f195491e0130a023bfdbb3c7802c516479f68)
- refactor: Update codebase for PHP 8 and Symfony 6. [`a0e10f6`](https://github.com/ecphp/eu-login-bundle/commit/a0e10f6608e8ac34e06290cbbd83a1689c0df658)
- ci: Add `prettier` workflow. [`9de0a39`](https://github.com/ecphp/eu-login-bundle/commit/9de0a394739e8649d8ecae76f16ec76b9c3bf1d1)

## [2.4.2](https://github.com/ecphp/eu-login-bundle/compare/2.4.1...2.4.2) - 2023-10-23

### Merged

- fix: add missing argument to trigger_deprecation call [`#57`](https://github.com/ecphp/eu-login-bundle/pull/57)

### Commits

- docs: update changelog [`997cc68`](https://github.com/ecphp/eu-login-bundle/commit/997cc68ed60847fb19c82130f60b2383cba31d75)

## [2.4.1](https://github.com/ecphp/eu-login-bundle/compare/2.4.0...2.4.1) - 2023-02-08

### Commits

- docs: Update changelog. [`1dd6c2c`](https://github.com/ecphp/eu-login-bundle/commit/1dd6c2c632d6f8c8b73fddab96621f0c8d36e917)
- fix: add `__toString` method [`3eca1a5`](https://github.com/ecphp/eu-login-bundle/commit/3eca1a50383b91eddbaccc2802ac789ba8c8d177)
- chore: update LICENSE file [`d1a24b7`](https://github.com/ecphp/eu-login-bundle/commit/d1a24b7f1398c37e212b596e63db430239034ec7)
- fix: decorate the `CasUserProvider` properly [`7aa24ee`](https://github.com/ecphp/eu-login-bundle/commit/7aa24eee1b49d91f3b9839ba210a6700478cef43)
- chore: update Nix development environment [`679a4e4`](https://github.com/ecphp/eu-login-bundle/commit/679a4e46be6ba6c8b5df3699e070f8b231022937)

## [2.4.0](https://github.com/ecphp/eu-login-bundle/compare/2.3.9...2.4.0) - 2022-08-25

### Merged

- Bump actions/cache from 2.1.7 to 3 [`#39`](https://github.com/ecphp/eu-login-bundle/pull/39)
- Bump actions/cache from 2.1.6 to 2.1.7 [`#38`](https://github.com/ecphp/eu-login-bundle/pull/38)

### Commits

- docs: Add changelog. [`0f408cc`](https://github.com/ecphp/eu-login-bundle/commit/0f408ccb0e394084851199fbfbe73662b0f8cdf1)
- ci: Update workflows. [`109d0eb`](https://github.com/ecphp/eu-login-bundle/commit/109d0ebbcf498c664e80db32bc9a399bc1ef2682)
- refactor: Update minor things. [`14bdb91`](https://github.com/ecphp/eu-login-bundle/commit/14bdb9165c3d2ac60a92008828114729f74dda05)
- chore: Align static files. [`06bf12c`](https://github.com/ecphp/eu-login-bundle/commit/06bf12c822597a0c9b74f251b2057afd219e5001)
- docs: Update documentation. [`0ecd91e`](https://github.com/ecphp/eu-login-bundle/commit/0ecd91e68cda920132488c1780b95eb2c15f0845)
- refactor: Update for Symfony &gt;= 5.4. [`fa5b2dc`](https://github.com/ecphp/eu-login-bundle/commit/fa5b2dc59a9c9cf5a0d3abeb5212645f2463666a)
- chore: Remove docker stuff, replace with `.envrc`. [`2eb1f48`](https://github.com/ecphp/eu-login-bundle/commit/2eb1f48d852475ac8188c253154b515a02ceb988)
- chore: Update licence holder. [`99130b7`](https://github.com/ecphp/eu-login-bundle/commit/99130b7d116e5002bbb95460c9bce389d0dcdc28)
- chore: Normalize `composer.json`. [`f93945f`](https://github.com/ecphp/eu-login-bundle/commit/f93945f5b3b2419f567db34a6817138f1cd2766a)

## [2.3.9](https://github.com/ecphp/eu-login-bundle/compare/2.3.8...2.3.9) - 2021-11-12

### Commits

- docs: Add/update CHANGELOG. [`076c736`](https://github.com/ecphp/eu-login-bundle/commit/076c73638d0b5b91e4b2665b0a59e665d10e5145)
- fix: Add missing methods. [`09d24cb`](https://github.com/ecphp/eu-login-bundle/commit/09d24cb5f15e45ade4522015d30ddce2333f3b82)
- chore: Add missing dev package. [`11ba629`](https://github.com/ecphp/eu-login-bundle/commit/11ba6291cdfc493742c4287360c43f5ef21e3741)

## [2.3.8](https://github.com/ecphp/eu-login-bundle/compare/2.3.7...2.3.8) - 2021-11-10

### Commits

- docs: Add/update CHANGELOG. [`8b9aab8`](https://github.com/ecphp/eu-login-bundle/commit/8b9aab86ce78d630e814e09e90a4d863c62766fe)
- Update `composer.json` to support new `ecphp/cas-bundle` [`a3b70f3`](https://github.com/ecphp/eu-login-bundle/commit/a3b70f33f86b1774df093dc1a07a5869d89323c4)

## [2.3.7](https://github.com/ecphp/eu-login-bundle/compare/2.3.6...2.3.7) - 2021-08-19

### Merged

- Update friends-of-phpspec/phpspec-code-coverage requirement from ^5.0.0 to ^6.1.0 [`#36`](https://github.com/ecphp/eu-login-bundle/pull/36)
- Update infection/infection requirement from ^0.15.3 || ^0.23 to ^0.24.0 [`#35`](https://github.com/ecphp/eu-login-bundle/pull/35)
- Bump actions/cache from 2.1.5 to 2.1.6 [`#34`](https://github.com/ecphp/eu-login-bundle/pull/34)

### Commits

- docs: Add/update CHANGELOG. [`20db369`](https://github.com/ecphp/eu-login-bundle/commit/20db3696010a96da0056a43fb39d8098ddb5abbc)
- refactor: Update Symfony services definitions. [`6d068e4`](https://github.com/ecphp/eu-login-bundle/commit/6d068e4e510fb338da90a481ae46f4fd51937086)
- Update friends-of-phpspec/phpspec-code-coverage requirement [`df090ff`](https://github.com/ecphp/eu-login-bundle/commit/df090ff18c88ad2a51ada6ec683356e79b39e087)
- ci: Enable builds only with PHP 7.4. [`1e14ac6`](https://github.com/ecphp/eu-login-bundle/commit/1e14ac65b742d89872264acae0e884edf899e1b5)
- Revert "ci: Disable builds on macOS until phpspec/phpspec#1380 is fixed." [`afac2a8`](https://github.com/ecphp/eu-login-bundle/commit/afac2a8a3e380a18ab8c82d53b689d9436713cd6)

## [2.3.6](https://github.com/ecphp/eu-login-bundle/compare/2.3.5...2.3.6) - 2021-07-05

### Merged

- Bump actions/cache from 2.1.4 to 2.1.5 [`#33`](https://github.com/ecphp/eu-login-bundle/pull/33)
- Bump actions/cache from v2 to v2.1.4 [`#31`](https://github.com/ecphp/eu-login-bundle/pull/31)
- Update vimeo/psalm requirement from ^3.14 to ^4.1 [`#24`](https://github.com/ecphp/eu-login-bundle/pull/24)
- Update friends-of-phpspec/phpspec-code-coverage requirement from ^4.3.2 to ^5.0.0 [`#28`](https://github.com/ecphp/eu-login-bundle/pull/28)

### Commits

- docs: Add/update CHANGELOG. [`4996a5f`](https://github.com/ecphp/eu-login-bundle/commit/4996a5f3eb157c6b7c008f8151944f13c40991ac)
- chore: Normalize composer.json. [`83b2f9d`](https://github.com/ecphp/eu-login-bundle/commit/83b2f9d99c89f4765662d9c96d74ad032c71dbdc)
- refactor: Autofix code style. [`63812a0`](https://github.com/ecphp/eu-login-bundle/commit/63812a020a010a80e465f7af5d81234b42b40cd1)
- ci: Disable builds on macOS until phpspec/phpspec#1380 is fixed. [`c4ffa75`](https://github.com/ecphp/eu-login-bundle/commit/c4ffa75e5c5b82e7958e9049f03da59cc3a696ea)
- ci: Enable automatic release. [`4a836b1`](https://github.com/ecphp/eu-login-bundle/commit/4a836b143da5263ec43a0444a8532bcb1e075162)
- chore: Update license. [`ab8b8f7`](https://github.com/ecphp/eu-login-bundle/commit/ab8b8f7599276ce4e7760c08ea88b5fa73a8a0f3)
- Update Grumphp configuration. [`e902f8d`](https://github.com/ecphp/eu-login-bundle/commit/e902f8d28ca192364deb4b19f45846309325a940)
- chore: Update composer.json. [`0c30729`](https://github.com/ecphp/eu-login-bundle/commit/0c30729ba1f2b6d59cc9e7c1900bc9d17ecd2c5d)
- chore: Update .gitattributes. [`a7f74b7`](https://github.com/ecphp/eu-login-bundle/commit/a7f74b70e8999c7913ae65295ce7495bf027636e)
- chore: Update docker stack for generating changelogs. [`3f866dc`](https://github.com/ecphp/eu-login-bundle/commit/3f866dc630986b84ed8c3d2435e83f9502d31de7)
- docs: Update link to ecphp/cas-bundle documentation. [`c009dee`](https://github.com/ecphp/eu-login-bundle/commit/c009dee77852f2ee36100eaa729d2c89adcc064f)
- Update friends-of-phpspec/phpspec-code-coverage requirement [`579bcc0`](https://github.com/ecphp/eu-login-bundle/commit/579bcc0eb5a75b88b12c8a1314f3df524907ad3e)

## [2.3.5](https://github.com/ecphp/eu-login-bundle/compare/2.3.4...2.3.5) - 2020-10-05

### Commits

- refactor: Get rid of mock, use real objects. [`7edf2f2`](https://github.com/ecphp/eu-login-bundle/commit/7edf2f267cf4807a74cf03df2f68e519e3b567b2)
- refactor: Add missing methods. [`ae2b276`](https://github.com/ecphp/eu-login-bundle/commit/ae2b2760af109483761f3019fa43b42efc337190)

## [2.3.4](https://github.com/ecphp/eu-login-bundle/compare/2.3.3...2.3.4) - 2020-09-01

### Merged

- Update fix xml parsing [`#15`](https://github.com/ecphp/eu-login-bundle/pull/15)

### Commits

- Minor code simplification. [`57cc981`](https://github.com/ecphp/eu-login-bundle/commit/57cc9815310231c88a9810fa9538fe86fa4223d2)
- Bump dev packages. [`6e70a92`](https://github.com/ecphp/eu-login-bundle/commit/6e70a923ee85e5ec2100b80dcf6da18486c47b62)
- Add a todo for later. [`d01a123`](https://github.com/ecphp/eu-login-bundle/commit/d01a1234220efc38118a3030d734f0913c2a4573)
- Update tests. [`41a4f85`](https://github.com/ecphp/eu-login-bundle/commit/41a4f853b35281baa20acf1a318bb4e6ba210f9a)
- Update codebase to parse XML in a more efficient maneer. [`99ede08`](https://github.com/ecphp/eu-login-bundle/commit/99ede0898a4b2a785a98a2e3072080844c5c721d)

## [2.3.3](https://github.com/ecphp/eu-login-bundle/compare/2.3.2...2.3.3) - 2020-08-07

### Merged

- Parse EU Access attributes. [`#8`](https://github.com/ecphp/eu-login-bundle/pull/8)

### Commits

- Remove dependency to loophp/collection. [`88b8f5b`](https://github.com/ecphp/eu-login-bundle/commit/88b8f5b2175e220594a2765e2f25b0822cd29319)
- Update tests coverage. [`619e492`](https://github.com/ecphp/eu-login-bundle/commit/619e49223c724a6e057f0b62fbbd444a3aa01ab3)
- Update composer.json. [`8cac221`](https://github.com/ecphp/eu-login-bundle/commit/8cac2217789137539028333d2fba2092439aad60)

## [2.3.2](https://github.com/ecphp/eu-login-bundle/compare/2.3.1...2.3.2) - 2020-07-27

### Commits

- Remove obsolete EuLoginUserProviderInterface. [`e0d253c`](https://github.com/ecphp/eu-login-bundle/commit/e0d253ce51d01c3ed34f4771587ea1e826980b6e)

## [2.3.1](https://github.com/ecphp/eu-login-bundle/compare/2.3.0...2.3.1) - 2020-07-27

### Commits

- Make sure that EuLoginUserProvider is final to enforce users to use the Decorator pattern when they need it. [`0a11562`](https://github.com/ecphp/eu-login-bundle/commit/0a115621c646882d457a66362f894ed7113e9c34)
- Add Psalm, Infection and Insights reports. [`4e696c2`](https://github.com/ecphp/eu-login-bundle/commit/4e696c2977adf21e3f74c5d5737b9632fc427a4c)

## [2.3.0](https://github.com/ecphp/eu-login-bundle/compare/2.2.3...2.3.0) - 2020-07-23

### Merged

- Use decorator pattern for the User Provider. [`#7`](https://github.com/ecphp/eu-login-bundle/pull/7)

### Commits

- Update Grumphp configuration. [`cbe2e31`](https://github.com/ecphp/eu-login-bundle/commit/cbe2e31c74553a40088f6da64e83848b4a31f337)
- Update composer.json. [`8eb9224`](https://github.com/ecphp/eu-login-bundle/commit/8eb9224a28d8a1507845e272c5b2fb0211405593)

## [2.2.3](https://github.com/ecphp/eu-login-bundle/compare/2.2.2...2.2.3) - 2020-07-23

### Commits

- Update composer.json. [`2540b2f`](https://github.com/ecphp/eu-login-bundle/commit/2540b2f3313f3df5793e83059c9bd36bccc4a1da)
- Deprecate EuLoginUser::getUser() method. [`11c2da2`](https://github.com/ecphp/eu-login-bundle/commit/11c2da2fdb59343124785b7ac614bb79cc0927de)

## [2.2.2](https://github.com/ecphp/eu-login-bundle/compare/2.2.1...2.2.2) - 2020-06-29

### Commits

- Fix typo in decorated service. [`58e87bb`](https://github.com/ecphp/eu-login-bundle/commit/58e87bb6c5306ea09d3cf564eb6a50a65ba03fb0)
- Sync documentation between branches. [`e21ef67`](https://github.com/ecphp/eu-login-bundle/commit/e21ef673b2b22471e825e041f936a4877ecad45d)
- Symfony recipe is live, update installation steps. [`115d4f2`](https://github.com/ecphp/eu-login-bundle/commit/115d4f29b0348e5b232933ab42f655e91d213bd0)
- Update composer.json. [`388a3db`](https://github.com/ecphp/eu-login-bundle/commit/388a3db59f88e06c5f7046ea87144302d61a9a05)
- Minimum version of Symfony is ^5.1. [`57ec345`](https://github.com/ecphp/eu-login-bundle/commit/57ec3458f030c29796b040cf1e9826c4660d6956)
- Update broken link. [`046a332`](https://github.com/ecphp/eu-login-bundle/commit/046a3324e87368b7f1eab7d8cb125764b56054aa)

## [2.2.1](https://github.com/ecphp/eu-login-bundle/compare/2.2.0...2.2.1) - 2020-06-17

### Merged

- Bump actions/cache from v1 to v2 [`#4`](https://github.com/ecphp/eu-login-bundle/pull/4)

### Commits

- composer.json [`5380c79`](https://github.com/ecphp/eu-login-bundle/commit/5380c7999d1ce3533e404e78906a27855e37d670)
- Load the services from the package, not from the final application. [`73bcf2c`](https://github.com/ecphp/eu-login-bundle/commit/73bcf2ce252366f60402cb71e974aca523eb13be)
- Update composer.json. [`785b1b6`](https://github.com/ecphp/eu-login-bundle/commit/785b1b6571eed5812b587b0654040c6f225d8bd0)
- Add Dependabot configuration. [`801298c`](https://github.com/ecphp/eu-login-bundle/commit/801298cbbeff3218dcd7dc763923e880b02269ef)

## [2.2.0](https://github.com/ecphp/eu-login-bundle/compare/2.1.2...2.2.0) - 2020-06-09

### Commits

- Update configuration, use decorators pattern. [`95b52db`](https://github.com/ecphp/eu-login-bundle/commit/95b52db49cb0c7999bf3cd844441f3fb62ac186c)
- Bump ecphp/ecas. [`e2d4651`](https://github.com/ecphp/eu-login-bundle/commit/e2d4651376759a617a2597cc8145a1fa584920a4)

## [2.1.2](https://github.com/ecphp/eu-login-bundle/compare/2.1.1...2.1.2) - 2020-05-18

### Commits

- Update documentation about configuring the firewall during installation. [`a6fcd7d`](https://github.com/ecphp/eu-login-bundle/commit/a6fcd7deca6794acbb3ccad642a74f310a79acb2)
- Add Docker stack for building documentation locally. [`1607444`](https://github.com/ecphp/eu-login-bundle/commit/1607444f8cbf946e878b28e056c359a684967fed)
- Update default configuration. [`ced39dd`](https://github.com/ecphp/eu-login-bundle/commit/ced39ddbe0bec24c6f3c54374506b97255591093)
- Update documentation. [`4545d05`](https://github.com/ecphp/eu-login-bundle/commit/4545d053c52e86c49ede653efe444573fe51cbb2)
- Bump drupol/php-conventions. [`dc1c90b`](https://github.com/ecphp/eu-login-bundle/commit/dc1c90be28922ea19ff92a59374df55fcd955b45)

## [2.1.1](https://github.com/ecphp/eu-login-bundle/compare/2.1.0...2.1.1) - 2020-05-07

### Commits

- Bump drupol/php-conventions. [`d14a593`](https://github.com/ecphp/eu-login-bundle/commit/d14a5939107433715bfefd27f59eef6081c75563)

## [2.1.0](https://github.com/ecphp/eu-login-bundle/compare/2.0.0...2.1.0) - 2020-03-12

### Merged

- Use decorator pattern in user class [`#3`](https://github.com/ecphp/eu-login-bundle/pull/3)

### Commits

- Update Scrutinizer configuration to avoid issues with some packages. [`00621a1`](https://github.com/ecphp/eu-login-bundle/commit/00621a1d865040a28276030b215b1b0e9c62f571)
- Update code-style, coding standard and code quality thanks to rector/rector tool. [`fb7b88a`](https://github.com/ecphp/eu-login-bundle/commit/fb7b88acb413c2fd604b154256c2db4395128538)
- Add more test coverage. [`135d31b`](https://github.com/ecphp/eu-login-bundle/commit/135d31bc1ced17db11ef1a3e3a7ac78a438ad77d)
- Use decorator pattern. [`314975a`](https://github.com/ecphp/eu-login-bundle/commit/314975a5e603a0bbaf23d4a0de6c0343a7c9041a)
- Update composer.json. [`d6d12ff`](https://github.com/ecphp/eu-login-bundle/commit/d6d12ffc1413bbe88ddc46e930d08a7488ff1d5a)

## [2.0.0](https://github.com/ecphp/eu-login-bundle/compare/1.3.7...2.0.0) - 2020-01-31

### Merged

- Make sure that the property exists and is array before merging it. [`#2`](https://github.com/ecphp/eu-login-bundle/pull/2)

### Commits

- Prepare first release. Switch to stable package versions. [`b891a89`](https://github.com/ecphp/eu-login-bundle/commit/b891a89949cebafe81dc41bb1646a48b63bcb266)
- Update composer.json and get rid of scrutinizer/ocular package. [`7039ca5`](https://github.com/ecphp/eu-login-bundle/commit/7039ca57b3e3bbb1090b1be0d4b4ca983ffb3abd)
- Add MAINTAINERS.txt file and update documentation. [`9b9c608`](https://github.com/ecphp/eu-login-bundle/commit/9b9c608ea7279e0a8e144bf92d595abf3278dee1)
- Update composer.json to enable Scrutinizer. [`a4cb326`](https://github.com/ecphp/eu-login-bundle/commit/a4cb326f4b577ccfeb393fb641036f07e1ede7a2)
- Update documentation copyrights. [`ea588b6`](https://github.com/ecphp/eu-login-bundle/commit/ea588b60f0eaeb3099d78c63ffce94c02cdc38eb)
- Migrate project to new organisation. [`ccdf289`](https://github.com/ecphp/eu-login-bundle/commit/ccdf289dcb867f698619789b24316da9d3faa99e)
- Update composer.json. [`c184142`](https://github.com/ecphp/eu-login-bundle/commit/c184142ab55b6df1a96ad0137ddf11b866cccad0)
- Do not depends on sensio/framework-extra-bundle. [`ca22516`](https://github.com/ecphp/eu-login-bundle/commit/ca22516e2f8f8823c07004345147bb79e8b5f6f4)
- Update composer.json file. [`8067b6b`](https://github.com/ecphp/eu-login-bundle/commit/8067b6b6afaa3bc2b5f70ffe7b270417fdb48d19)
- Update static dev files. [`3fa6b5a`](https://github.com/ecphp/eu-login-bundle/commit/3fa6b5a41f3d14fd660a8a5c227994b5dd25e73f)
- Update composer.json file. [`4cfcbf3`](https://github.com/ecphp/eu-login-bundle/commit/4cfcbf3b88f3a026065230026fcaa42eb0add7a0)
- Remove obsolete tests. [`5291260`](https://github.com/ecphp/eu-login-bundle/commit/52912606035e542c32bf2e1a5862fbb5edae6056)
- Remove Travis, use Github actions. [`f5448d2`](https://github.com/ecphp/eu-login-bundle/commit/f5448d24ee5c0e4ef4a9d41c09b4050f0be40fee)

## [1.3.7](https://github.com/ecphp/eu-login-bundle/compare/1.3.6...1.3.7) - 2022-08-22

### Merged

- fix: add missing arg to trigger_deprecation call [`#41`](https://github.com/ecphp/eu-login-bundle/pull/41)

### Commits

- chore: Update `composer.json`. [`7caa3dd`](https://github.com/ecphp/eu-login-bundle/commit/7caa3dd78e63b041e684b95e49e6dc579cb49f77)
- docs: Update link to ecphp/cas-bundle documentation. [`804b995`](https://github.com/ecphp/eu-login-bundle/commit/804b99536621418483ebb802fb46418f4682f0a2)

## [1.3.6](https://github.com/ecphp/eu-login-bundle/compare/1.3.5...1.3.6) - 2020-10-05

### Commits

- refactor: Get rid of mock, use real objects. [`1fe2c09`](https://github.com/ecphp/eu-login-bundle/commit/1fe2c099f14eafe52b333f5295b8b6c1c405be4e)
- refactor: Add missing methods. [`e3d4136`](https://github.com/ecphp/eu-login-bundle/commit/e3d4136022eddb15ea056b7bafd799efc0d32420)

## [1.3.5](https://github.com/ecphp/eu-login-bundle/compare/1.3.4...1.3.5) - 2020-09-01

### Commits

- Minor code simplification. [`d43152f`](https://github.com/ecphp/eu-login-bundle/commit/d43152f127cf3e4cf3bb072f7548062b1f8c0481)
- Bump dev packages. [`26af184`](https://github.com/ecphp/eu-login-bundle/commit/26af1840ff80175deef61db8b510e74e8bcbc78f)
- Add a todo for later. [`f181ac7`](https://github.com/ecphp/eu-login-bundle/commit/f181ac7ea84e053afca4d69720ec1fd64acd1ee7)
- Update tests. [`212b966`](https://github.com/ecphp/eu-login-bundle/commit/212b966508ad31d8cc996d5b270ace861dce851c)
- Update codebase to parse XML in a more efficient maneer. [`f9c247b`](https://github.com/ecphp/eu-login-bundle/commit/f9c247b10fefd7dde55c2a2bfa9c8f519d142c22)

## [1.3.4](https://github.com/ecphp/eu-login-bundle/compare/1.3.3...1.3.4) - 2020-08-07

### Commits

- Remove dependency to loophp/collection. [`4be7a54`](https://github.com/ecphp/eu-login-bundle/commit/4be7a5485ed7591e289564c6ada2ddfad57279ef)
- Update tests coverage. [`249503f`](https://github.com/ecphp/eu-login-bundle/commit/249503fd2dd2117aa40043e72a3481f83298ef79)
- Update composer.json. [`0744cbf`](https://github.com/ecphp/eu-login-bundle/commit/0744cbfff1ee05f56c11c14ab71081addce039bd)
- Parse EU Access attributes. [`44cc7dc`](https://github.com/ecphp/eu-login-bundle/commit/44cc7dcd699f079bdca8cd37f767c36a37fc920a)

## [1.3.3](https://github.com/ecphp/eu-login-bundle/compare/1.3.2...1.3.3) - 2020-07-27

### Commits

- Remove obsolete EuLoginUserProviderInterface. [`8609b79`](https://github.com/ecphp/eu-login-bundle/commit/8609b79d2069b20af665ff9749f674141ec1563a)

## [1.3.2](https://github.com/ecphp/eu-login-bundle/compare/1.3.1...1.3.2) - 2020-07-27

### Commits

- Make sure that EuLoginUserProvider is final to enforce users to use the Decorator pattern when they need it. [`2f1a12b`](https://github.com/ecphp/eu-login-bundle/commit/2f1a12bb4cfac5067e258ff4796376164df75bc4)

## [1.3.1](https://github.com/ecphp/eu-login-bundle/compare/1.3.0...1.3.1) - 2020-07-27

### Commits

- Fix typo. [`854ecbd`](https://github.com/ecphp/eu-login-bundle/commit/854ecbd50afe77641229da345ee0a6ae7fe76b66)
- Add Psalm, Infection and Insights reports. [`bec853a`](https://github.com/ecphp/eu-login-bundle/commit/bec853a1ddd2b65726be5ae755f7d4907d618e55)

## [1.3.0](https://github.com/ecphp/eu-login-bundle/compare/1.2.2...1.3.0) - 2020-07-23

### Commits

- Update Grumphp configuration. [`0f7da23`](https://github.com/ecphp/eu-login-bundle/commit/0f7da23a7faeaf35fb0136caa7b45e39bc1c5d43)
- Update composer.json. [`0291e44`](https://github.com/ecphp/eu-login-bundle/commit/0291e4404790a2ede065c5fa0fe1640fc8f3689b)
- Use decorator pattern for the User Provider. [`3767a11`](https://github.com/ecphp/eu-login-bundle/commit/3767a11aca80c73e7f49115cfb3b5539d2c8c8e0)

## [1.2.2](https://github.com/ecphp/eu-login-bundle/compare/1.2.1...1.2.2) - 2020-07-23

### Commits

- Update composer.json. [`2b632af`](https://github.com/ecphp/eu-login-bundle/commit/2b632af9879c78d818a3da222bd968184191a141)
- Deprecate EuLoginUser::getUser() method. [`49c12f9`](https://github.com/ecphp/eu-login-bundle/commit/49c12f9a14fc4bc0d9d59e5cad9122cad73199df)
- Symfony recipe is live, update installation steps. [`ed78d33`](https://github.com/ecphp/eu-login-bundle/commit/ed78d3309fc710312e0a209336dacc6ab63ee3f1)
- Convert services.yaml into services.php. [`3fb7d6a`](https://github.com/ecphp/eu-login-bundle/commit/3fb7d6a3392ca77634eaa8b83d4bad36b6edf852)

## [1.2.1](https://github.com/ecphp/eu-login-bundle/compare/1.2.0...1.2.1) - 2020-06-17

### Commits

- Update composer.json [`e34639e`](https://github.com/ecphp/eu-login-bundle/commit/e34639e04bf2155d4cc7e0a5d64288838ef6cca0)
- Load the services from the package, not from the final application. [`a2a4d7b`](https://github.com/ecphp/eu-login-bundle/commit/a2a4d7b4bfc3bc4f5783ed7aadf1c76682fea47b)
- Add Dependabot configuration. [`335335a`](https://github.com/ecphp/eu-login-bundle/commit/335335abce14e1fb6a70eab1eb75313d81b3e92b)

## [1.2.0](https://github.com/ecphp/eu-login-bundle/compare/1.1.2...1.2.0) - 2020-06-09

### Commits

- Update composer.json. [`30ce8b2`](https://github.com/ecphp/eu-login-bundle/commit/30ce8b2e85b0bfffd8c3815657b7aea157e27b31)
- Update configuration, use decorators pattern. [`7338741`](https://github.com/ecphp/eu-login-bundle/commit/733874100038135ebd316eead28e749d2fdb510a)
- Add Docker stack for building documentation locally. [`c785751`](https://github.com/ecphp/eu-login-bundle/commit/c78575195f268fa47240d3f485f3e6e5ce36c29e)
- Update documentation. [`25addde`](https://github.com/ecphp/eu-login-bundle/commit/25adddea60c59f173fe48deff0782e13555edadb)

## [1.1.2](https://github.com/ecphp/eu-login-bundle/compare/1.1.1...1.1.2) - 2020-05-18

### Commits

- Update documentation about configuring the firewall during installation. [`1fe34ef`](https://github.com/ecphp/eu-login-bundle/commit/1fe34ef98735ce2288e49983dc953043f6e88799)
- Update configuration files to avoid errors when installing. [`c5c27e9`](https://github.com/ecphp/eu-login-bundle/commit/c5c27e99ce54a24321ab66ecdf44c4b57245fe94)

## [1.1.1](https://github.com/ecphp/eu-login-bundle/compare/1.1.0...1.1.1) - 2020-05-07

### Commits

- Bump drupol/php-conventions. [`285be0a`](https://github.com/ecphp/eu-login-bundle/commit/285be0a82472a369613940e07d98661a890a7999)

## [1.1.0](https://github.com/ecphp/eu-login-bundle/compare/1.0.0...1.1.0) - 2020-03-12

### Commits

- Add missing tests. [`b3531f1`](https://github.com/ecphp/eu-login-bundle/commit/b3531f1c0637d4723d0a27408e68171c779663ff)
- Use decorator pattern in EuLoginUser. [`6e68297`](https://github.com/ecphp/eu-login-bundle/commit/6e682974d00f12c8d72d5c1c0bcd1d89dcc57e62)
- Update composer.json. [`96416ef`](https://github.com/ecphp/eu-login-bundle/commit/96416ef154e0dc3df4a28508246f46ef54969a74)
- Update README links to point to the proper branch. [`b15c583`](https://github.com/ecphp/eu-login-bundle/commit/b15c58338c8e7b4d3a3e0015f5789d8bd7c24a19)

## 1.0.0 - 2020-01-31

### Merged

- Make sure that the property exists and is array before merging it. [`#2`](https://github.com/ecphp/eu-login-bundle/pull/2)

### Commits

- Prepare first release. Switch to stable package versions. [`1bfa8f2`](https://github.com/ecphp/eu-login-bundle/commit/1bfa8f26bb80a77bae1a67cd28b2b76da3dbd335)
- Rename branch 4.4 into 1.0 and update documentation accordingly. [`8f087a1`](https://github.com/ecphp/eu-login-bundle/commit/8f087a112ed0ae7d2deebab5bcde05601554f89c)
- Update composer.json and get rid of scrutinizer/ocular package. [`2f3feef`](https://github.com/ecphp/eu-login-bundle/commit/2f3feefacadde3a89e43dedeca1f4f779adae2cf)
- Add MAINTAINERS.txt file and update documentation. [`0f055c9`](https://github.com/ecphp/eu-login-bundle/commit/0f055c93e79350f795f2d53338aee6d284288e5b)
- Update composer.json to enable Scrutinizer. [`737a228`](https://github.com/ecphp/eu-login-bundle/commit/737a2287ad9c112d2e476d1bf7f05591094411b7)
- Update documentation copyrights. [`4260810`](https://github.com/ecphp/eu-login-bundle/commit/4260810dff473a3418703320d36d25c7e3265ebc)
- Migrate project to new organisation. [`0ae03f6`](https://github.com/ecphp/eu-login-bundle/commit/0ae03f68b6ae9a82ec97a240b42bb738895eaa02)
- Update documentation. [`1f2ded9`](https://github.com/ecphp/eu-login-bundle/commit/1f2ded9fec5403db5bfdedaae6dfbc42f5ab31bc)
- Update composer.json. [`66f8ba9`](https://github.com/ecphp/eu-login-bundle/commit/66f8ba9eb8d5a25748b16244436de326637c21de)
- Do not depends on sensio/framework-extra-bundle. [`1fba067`](https://github.com/ecphp/eu-login-bundle/commit/1fba067e77647d03463198dced01db49634e78af)
- Update static dev files. [`999ca05`](https://github.com/ecphp/eu-login-bundle/commit/999ca05cc217234b567321ec31f782a5f8e60496)
- Update composer.json file. [`201ec0e`](https://github.com/ecphp/eu-login-bundle/commit/201ec0ead1a0278fb4dbfc33c7c1ef3569718d14)
- Fix PHPStan warning. [`f41de4e`](https://github.com/ecphp/eu-login-bundle/commit/f41de4eefbc7a1387ffffb0fe90bc749c2bc4d0a)
- Remove obsolete tests. [`53ba09c`](https://github.com/ecphp/eu-login-bundle/commit/53ba09c4aa149f76e8e09e72af50f76dae044771)
- Remove Travis, use Github actions. [`d54d4a9`](https://github.com/ecphp/eu-login-bundle/commit/d54d4a90ad85f7b782af071afae4e03e8f87fb2a)
- Fix compatibility with Symfony 4. [`d0cb8c8`](https://github.com/ecphp/eu-login-bundle/commit/d0cb8c8bf90676b7841c89119c24f4e437c3397c)
- Remove Extension and use config files only. [`0e58fa0`](https://github.com/ecphp/eu-login-bundle/commit/0e58fa0b5222b36e3203c70d52afc2587435a66d)
- Fix namespace. [`7499543`](https://github.com/ecphp/eu-login-bundle/commit/74995437a50470b4d107be54991433e98f8351a2)
- Update configuration files. [`352615a`](https://github.com/ecphp/eu-login-bundle/commit/352615a335aae1f8d7e67830145f78917dc8be2d)
- Update configuration files. [`cf12917`](https://github.com/ecphp/eu-login-bundle/commit/cf1291726e6b93a61c29d203fbe054a932435a08)
- Update configuration files and add an extension. [`29b02a2`](https://github.com/ecphp/eu-login-bundle/commit/29b02a248e32cd1cdbef1217a622cd31c4c6633f)
- Update configuration files and add an extension. [`1120633`](https://github.com/ecphp/eu-login-bundle/commit/1120633ce73d85a3f6568d690f8346606b0ed998)
- Depends on drupol/ecas for cas protocol workflow. [`d99bc8f`](https://github.com/ecphp/eu-login-bundle/commit/d99bc8fad4f9ba6652ebf1478249faeba76c8633)
- Add missing test dependency. [`7097dc9`](https://github.com/ecphp/eu-login-bundle/commit/7097dc9224fb8e33e62abe1cb837bec7fdc55918)
- Fix PHPStan errors. [`94c2846`](https://github.com/ecphp/eu-login-bundle/commit/94c28469db9aea697c4bbb73d884a4fb8953687e)
- Update composer.json. [`6ba7471`](https://github.com/ecphp/eu-login-bundle/commit/6ba7471088642a8b51ada38cddc63f304b8411ba)
- Update composer.json. [`7f356c3`](https://github.com/ecphp/eu-login-bundle/commit/7f356c31ae2c7969621c426fe968a78192845ed1)
- Update docs. [`7db14c4`](https://github.com/ecphp/eu-login-bundle/commit/7db14c46116b675f717c5a1edc098b25cc7d0804)
- Update default config files. [`01ef9a7`](https://github.com/ecphp/eu-login-bundle/commit/01ef9a7e8fa2000f7949c8b44abff60ad1782d31)
- Update composer.json. [`511b92e`](https://github.com/ecphp/eu-login-bundle/commit/511b92ea0cab763f404032bfd155cd4e94c5ea27)
- Relax dependencies. [`faafdbe`](https://github.com/ecphp/eu-login-bundle/commit/faafdbe3ef2201cf522af8fcbcc27c04dfec545c)
- Use stable versions now that it has been released. [`d38bad5`](https://github.com/ecphp/eu-login-bundle/commit/d38bad5d3c5959459c6ba130c703d03c4ffe0ab9)
- Update static files. [`b013125`](https://github.com/ecphp/eu-login-bundle/commit/b0131256c96caecd06e9b67dce526963f72c6b9f)
- Add tests. [`0360b1a`](https://github.com/ecphp/eu-login-bundle/commit/0360b1a3e70ca81fb947ced2b1ee0cb6a43edb4e)
- Update some classes. [`ff78081`](https://github.com/ecphp/eu-login-bundle/commit/ff78081653833e061f1271c7c465336dce3bf64a)
- Wip [`f1c3643`](https://github.com/ecphp/eu-login-bundle/commit/f1c36439d9ec3cbc642c2f626d5886802e0bd164)
- Documentation. [`837f043`](https://github.com/ecphp/eu-login-bundle/commit/837f043b6b60b5bdd498526503fca69c44f246f1)
- Documentation. [`0d2b83f`](https://github.com/ecphp/eu-login-bundle/commit/0d2b83fc6224696aa5068cdac1c155947380afd4)
- Documentation. [`370f2be`](https://github.com/ecphp/eu-login-bundle/commit/370f2be1a9f69c111da17da29804bfb4fa484046)
- wip [`f4fc9bd`](https://github.com/ecphp/eu-login-bundle/commit/f4fc9bde2192e0d48a97f179327f8e5c04ea0a21)
- wip [`0c5b492`](https://github.com/ecphp/eu-login-bundle/commit/0c5b49218767c0b7a918665705c07d6966a34fca)
- wip [`2def355`](https://github.com/ecphp/eu-login-bundle/commit/2def355acbeb277beab78e5cdcd91d936ac8ce31)
- wip [`0f05c4a`](https://github.com/ecphp/eu-login-bundle/commit/0f05c4ad7bb648db29b0305cecb5de5f8489fa29)
- documentation [`aee6bf9`](https://github.com/ecphp/eu-login-bundle/commit/aee6bf9b4bcddc00c59e2f84330b6bde41e2a0b1)
- wip [`fdccd59`](https://github.com/ecphp/eu-login-bundle/commit/fdccd59ce384ca51b951a990d425e53227bc92b3)
- wip [`e180014`](https://github.com/ecphp/eu-login-bundle/commit/e1800144d6bb8b600a019bd5b05b73f48990d7af)
- wip [`a91624d`](https://github.com/ecphp/eu-login-bundle/commit/a91624d48d4f5de92032643d46e9d90182e91c0b)
- wip [`43c7e3f`](https://github.com/ecphp/eu-login-bundle/commit/43c7e3ffd4ce81f3231f2bdd700ae05b8e92deca)
- wip [`e3e00fb`](https://github.com/ecphp/eu-login-bundle/commit/e3e00fba39b783b78f854bab318fc96e8ae0f448)
- wip [`e61e35d`](https://github.com/ecphp/eu-login-bundle/commit/e61e35db3f52ccd1f36d10c7d025f7ec47ad9a6d)
- wip [`f554df8`](https://github.com/ecphp/eu-login-bundle/commit/f554df8d17bf6424e7c2a1bd5e006d9bfbb6aa8f)
- wip [`f0ad094`](https://github.com/ecphp/eu-login-bundle/commit/f0ad094ad432753776eeb471ebf331a7cf2e81c8)
- Wip. [`a3e2556`](https://github.com/ecphp/eu-login-bundle/commit/a3e2556109b5139321f20cd2e461088e3871ece2)
- Initial commit. [`bb79bed`](https://github.com/ecphp/eu-login-bundle/commit/bb79bed29dc1d42105b33d5b9b6ac2b3e853c8bb)
