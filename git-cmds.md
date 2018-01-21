* checked out goetas-webservices/xsd-reader c51bd4f9f3cb5e61c56a280c2e8945f7ad215c67
* `git rebase interactive --root`
* remove everything after 976e362 but before 98d74f6
* remove everything before 976e362
* * mark `composer.json` as modified
* * mark `.travis.yml` as deleted
* * mark `.scrutinizer.yml` as deleted
* * mark files in `src` and `tests` as deleted
* `git filter-branch --prune-empty`
* `git rebase interactive --root`
  * remove packages from composer.json not used
   * 4464d0c adding php-cs-fixer-config
   * 30b063e Static analysis (#18)
   * b34ac10 raising minimum php requirements
   * ba1b7bc package now shares same base php requirements as phpstan, can use it in erquire-dev
   * d753fd6 switching to config file to require max level & support for later customisations
   * 6547cf5 preferring to bundle testing bins in require-dev for consistent development
   * c7cd0af updating php-cs-fixer config file for php 7.0
   * 3dda67e using stricter type hints. dropping psalm from testing due to not handling `@return $this` as expected
   * 09d9c5c applying phpstan-strict-rules
   * c9aa2b6 version bump
   * e561545 starting moving to php 7.1
* `git rebase interactive --root`
  * add php-cs-fixer package to commit where php-cs-fixer config is added
* `git rebase interactive --root`
 * remove composer.lock
 * update tests
