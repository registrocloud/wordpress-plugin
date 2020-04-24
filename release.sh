#!/bin/bash
set -e

[[ -d vendor ]] && mv vendor vendor.bak
[[ -f composer.lock ]] && mv composer.lock composer.lock.bak

composer install --no-dev --prefer-dist

curl -sL git.io/dist.sh | bash -

[[ -d vendor.bak ]] && rm -fr vendor && mv vendor.bak vendor
[[ -f composer.lock.bak ]] && rm -f composer.lock && mv composer.lock.bak composer.lock

echo "Done."
