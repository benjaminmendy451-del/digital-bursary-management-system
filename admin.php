# OS-specific
.DS_Store
Thumbs.db

# Editor settings
.vscode/
.idea/

# PHP
vendor/

# Logs
*.log

# Runtime
tmp/
cache/

# Compiled C++
*.o
bursary_calculator

# Environment files
.env

# Data files if generated
*.sqlite
*.db

# Node modules if used later
node_modules/

# Mac/Linux
*.swp
*.swo

# Windows
*.tmp

# Local runtime
php_errors.log

# Uploaded content
uploads/

# Generated files
coverage/

# Composer
composer.lock

# Keep data files tracked
!data/
!data/*.json

# Keep source tracked
!src/
!src/*.cpp

# Public assets tracked
!assets/
!assets/css/
!assets/js/
!assets/css/*.css
!assets/js/*.js

# App files
!*.php
!README.md

# Git keep
!.gitignore

# If generated HTML is later added
*.html
!index.php
!application.php
!admin.php

# ignore hidden temp files
.*
!.gitignore
!README.md
!

# Prevent ignoring repository root files intentionally
!index.php
!application.php
!admin.php
!process_application.php
!includes/
!includes/*.php
!src/
!src/*.cpp
!assets/
!assets/css/
!assets/js/
!data/
!data/*.json

# Keep root structure intact
!README.md
!index.php
!application.php
!admin.php
!process_application.php
!includes/functions.php
!assets/css/style.css
!assets/js/script.js
!src/bursary_calculator.cpp
!data/applications.json
!data/users.json

# general excludes
*.bak
*.orig
*
!*/
!*.php
!*.md
!*.css
!*.js
!*.cpp
!*.json
!*.gitignore

# Re-allow repo files explicitly
!README.md
!index.php
!application.php
!admin.php
!process_application.php
!includes/functions.php
!assets/css/style.css
!assets/js/script.js
!src/bursary_calculator.cpp
!data/applications.json
!data/users.json
!data/
!assets/
!src/
!includes/

# keep version control clean from generated outputs
*.log
*.tmp
*.DS_Store

# allow git tracking of data
!data/
!data/*.json

# no more broad ignores
