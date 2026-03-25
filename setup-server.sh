#!/usr/bin/env bash
# =============================================================================
#  Ashfield Travel — First-Time Server Setup Script
#  Run ONCE after purchasing SiteGround to clone the repo onto the server.
#  Usage:  ./setup-server.sh
# =============================================================================

set -euo pipefail

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
ENV_FILE="$SCRIPT_DIR/.env"

if [[ ! -f "$ENV_FILE" ]]; then
  echo "❌  .env file not found. Copy .env.example → .env first."
  exit 1
fi

source "$ENV_FILE"

: "${SG_USER:?  SG_USER not set in .env}"
: "${SG_HOST:?  SG_HOST not set in .env}"
: "${SG_PORT:=18765}"
: "${SG_THEMES_DIR:?  SG_THEMES_DIR not set in .env}"
: "${GITHUB_REPO_SSH:?  GITHUB_REPO_SSH not set in .env}"
: "${GIT_BRANCH:=main}"

THEME_FOLDER="ashfield-travel-theme"

echo ""
echo "╔══════════════════════════════════════════════════╗"
echo "║     Ashfield Travel — First-Time Server Setup    ║"
echo "╚══════════════════════════════════════════════════╝"
echo "  Host        : $SG_HOST"
echo "  Themes dir  : $SG_THEMES_DIR"
echo "  Repo        : $GITHUB_REPO_SSH"
echo ""
echo "⚠️   This clones the theme repo onto SiteGround for the first time."
read -r -p "▶  Continue? (y/N) " CONFIRM
[[ "$CONFIRM" =~ ^[Yy]$ ]] || { echo "Cancelled."; exit 0; }

echo ""
echo "🚀  Connecting to SiteGround..."

ssh -p "$SG_PORT" "$SG_USER@$SG_HOST" bash <<REMOTE
  set -euo pipefail

  echo "📁  Navigating to themes directory..."
  mkdir -p "$SG_THEMES_DIR"
  cd "$SG_THEMES_DIR"

  # ── Add GitHub to known_hosts on server ────────────────────────────────────
  echo "🔑  Trusting GitHub host key..."
  mkdir -p ~/.ssh
  ssh-keyscan -H github.com >> ~/.ssh/known_hosts 2>/dev/null
  chmod 600 ~/.ssh/known_hosts

  # ── Clone repo ─────────────────────────────────────────────────────────────
  if [[ -d "$THEME_FOLDER/.git" ]]; then
    echo "ℹ️   Repo already cloned — pulling latest instead..."
    cd "$THEME_FOLDER" && git pull origin "$GIT_BRANCH"
  else
    echo "📥  Cloning ashfield-travel-theme from GitHub..."
    git clone --branch "$GIT_BRANCH" "$GITHUB_REPO_SSH" "$THEME_FOLDER"
    cd "$THEME_FOLDER"
  fi

  # ── Permissions ────────────────────────────────────────────────────────────
  echo "🔒  Setting file permissions..."
  find . -type f -exec chmod 644 {} \;
  find . -type d -exec chmod 755 {} \;
  chmod +x deploy.sh setup-server.sh 2>/dev/null || true

  echo ""
  echo "✅  Setup complete!"
  echo "    Theme is at: $SG_THEMES_DIR/$THEME_FOLDER"
  echo ""
  echo "    Next steps:"
  echo "    1. Log into WordPress Admin"
  echo "    2. Appearance → Themes → Activate 'Ashfield Travel'"
  echo ""
REMOTE
