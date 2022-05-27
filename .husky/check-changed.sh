function changed {
  git diff-tree -r --name-only --no-commit-id ORIG_HEAD HEAD | grep "^$1" > /dev/null 2>&1
}

if changed 'web/yarn.lock'; then
  echo -ne '\u000a\u001b[31mNOTICE:\u001b[m \u001b[33mDetected a change in \u001b[37myarn.lock\u001b[33m. Please run \u001b[36myarn\u001b[m\u000a'
fi

if changed 'api/composer.lock'; then
  echo -ne '\u000a\u001b[31mNOTICE:\u001b[m \u001b[33mDetected a change in \u001b[37mcomposer.lock\u001b[33m. Please run \u001b[36mcomposer install\u001b[m\u000a'
fi

if changed 'api/database/'; then
  echo -ne '\u000a\u001b[31mNOTICE:\u001b[m \u001b[33mDetected a change in \u001b[37mdatabase/factories\u001b[33m. Please run \u001b[36mphp artisan migrate:fresh --seed\u001b[m\u000a'
fi

exit 0
